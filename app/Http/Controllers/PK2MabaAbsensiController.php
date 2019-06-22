<?php

namespace App\Http\Controllers;

use App\PK2MabaAbsensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet;

class PK2MabaAbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pk2mabaAbsensis = PK2MabaAbsensi::all();
        return view('panel-admin.pk2maba.absensi-index', compact('pk2mabaAbsensis'));
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
        $uploadedExcel = $request->file('import_pk2maba_absensi');

        $reader = new PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $reader->setLoadSheetsOnly('pk2maba_absensi');

        /** Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = $reader->load($uploadedExcel->getPathName());
        $spreadsheetArray = $spreadsheet->getActiveSheet()->toArray();

        foreach ($spreadsheetArray[0] as $column_index => $data_key) {
            switch ($data_key) {
                case 'NIM':
                    $nim_index = $column_index;
                    break;
                case 'nilai_rangkaian1':
                    $nilai_rangkaian1_index = $column_index;
                    break;
                case 'nilai_rangkaian2':
                    $nilai_rangkaian2_index = $column_index;
                    break;
            }
        }

        if (isset($nim_index) && isset($nilai_rangkaian1_index) && isset($nilai_rangkaian2_index)) {
            $error_row = null;
            try {
                DB::beginTransaction();
                // database queries here
                for ($i = 1; $i < count($spreadsheetArray); $i++) {
                    $data_row = $spreadsheetArray[$i];
					$error_row = $i;
					
                    $affected = DB::update('update pk2maba_absensi set nilai_rangkaian1 = ?, nilai_rangkaian2 = ? where nim = ?',
                        [$data_row[$nilai_rangkaian1_index], $data_row[$nilai_rangkaian2_index], $data_row[$nim_index]]);
                }
                DB::commit();
                $error_row = null;

            } catch (\PDOException $e) {
                // Woopsy
                DB::rollBack();
            }
            if ($error_row) {
                echo 'Terjadi kesalahan impor pada baris ' . $error_row . '<br>Impor dibatalkan!';
            } else {
                echo 'Berhasil!';
            }
        } else {
            echo 'Terjadi kesalahan format!';
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
        $pk2mabaAbsensi = PK2MabaAbsensi::where('nim', $nim)->first();
        return view('panel-admin.pk2maba.absensi-edit', compact('pk2mabaAbsensi'));
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
        $dataAbsen = PK2MabaAbsensi::where('nim', $nim)->update([
            'nilai_rangkaian1' => $request->nilai_rangkaian1,
            'nilai_rangkaian2' => $request->nilai_rangkaian2,
        ]);
        return redirect()->route('panel.kegiatan.pk2maba.absensi.index')->with('alert', 'Berhasil mengubah data absensi PK2Maba');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $dataAbsen = PK2MabaAbsensi::where('nim', $nim)->update([
            'nilai_rangkaian1' => 0,
            'nilai_rangkaian2' => 0,
        ]);
        return redirect()->route('panel.kegiatan.pk2maba.absensi.index')->with('alert', 'Berhasil menghapus data absensi PK2Maba');
    }
}
