<?php

namespace App\Http\Controllers;

use App\PK2MTourAbsensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet;

class PK2MTourAbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pk2mTourAbsensis = PK2MTourAbsensi::all();
        return view('panel-admin.pkm.absensi-index', compact('pk2mTourAbsensis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uploadedExcel = $request->file('import_pk2m_tour_absensi');

        $reader = new PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $reader->setLoadSheetsOnly('pk2m_tour_absensi');

        /** Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = $reader->load($uploadedExcel->getPathName());
        $spreadsheetArray = $spreadsheet->getActiveSheet()->toArray();

        foreach ($spreadsheetArray[0] as $column_index => $data_key) {
            switch ($data_key) {
                case 'NIM':
                    $nim_index = $column_index;
                    break;
                case 'nilai_rangkaian6':
                    $nilai_rangkaian6_index = $column_index;
                    break;
                case 'nilai_rangkaian7':
                    $nilai_rangkaian7_index = $column_index;
                    break;
                case 'nilai_rangkaian8':
                    $nilai_rangkaian8_index = $column_index;
                    break;
            }
        }

        if (isset($nim_index) && isset($nilai_rangkaian6_index) && isset($nilai_rangkaian7_index) && isset($nilai_rangkaian8_index)) {
            $error_row = null;
            try {
                DB::beginTransaction();
                // database queries here
                for ($i = 1; $i < count($spreadsheetArray); $i++) {
                    $data_row = $spreadsheetArray[$i];
                    $error_row = $i;

                    PK2MTourAbsensi::find($data_row[$nim_index])->update([
                        'nilai_rangkaian6' => $data_row[$nilai_rangkaian6_index],
                        'nilai_rangkaian7' => $data_row[$nilai_rangkaian7_index],
                        'nilai_rangkaian8' => $data_row[$nilai_rangkaian8_index],
                    ]);
                }
                DB::commit();
                return redirect()->back()->with('alert-success', 'Impor nilai berhasil');
            } catch (\PDOException $e) {
                // Woopsy
                DB::rollBack();
                return redirect()->back()->with('alert-error', 'Terjadi kesalahan impor pada baris ' . $error_row . '. Impor dibatalkan! ' . $e);
            }
        } else {
            return redirect()->back()->with('alert-error', 'Terjadi kesalahan format!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        $pk2mTourAbsensi = PK2MTourAbsensi::find($nim);
        return view('panel-admin.pkm.absensi-edit', compact('pk2mTourAbsensi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        $dataAbsen = PK2MTourAbsensi::find($nim)->update([
            'nilai_rangkaian6' => $request->nilai_rangkaian6,
            'nilai_rangkaian7' => $request->nilai_rangkaian7,
            'nilai_rangkaian8' => $request->nilai_rangkaian8,
        ]);
        return redirect()->route('panel.kegiatan.pkm.absensi.index')->with('alert-success', 'Berhasil mengubah data absensi PK2M Tour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $dataAbsen = PK2MTourAbsensi::find($nim)->update([
            'nilai_rangkaian6' => 0,
            'nilai_rangkaian7' => 0,
            'nilai_rangkaian8' => 0,
        ]);
        return redirect()->route('panel.kegiatan.pkm.absensi.index')->with('alert-success', 'Berhasil menghapus data absensi PK2M Tour');
    }
}
