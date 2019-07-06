<?php

namespace App\Http\Controllers;

use App\PK2MTourKeaktifan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet;

class PK2MTourKeaktifanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pk2mTourKeaktifans = PK2MTourKeaktifan::all();
        return view('panel-admin.pkm.keaktifan-index', compact('pk2mTourKeaktifans'));
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
        $uploadedExcel = $request->file('import_pk2m_tour_keaktifan');

        $reader = new PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $reader->setLoadSheetsOnly('pk2m_tour_keaktifan');

        /** Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = $reader->load($uploadedExcel->getPathName());
        $spreadsheetArray = $spreadsheet->getActiveSheet()->toArray();

        foreach ($spreadsheetArray[0] as $column_index => $data_key) {
            switch ($data_key) {
                case 'NIM':
                    $nim_index = $column_index;
                    break;
                case 'aktif_rangkaian6':
                    $aktif_rangkaian6_index = $column_index;
                    break;
                case 'penerapan_nilai_rangkaian6':
                    $penerapan_nilai_rangkaian6_index = $column_index;
                    break;
                case 'aktif_rangkaian7':
                    $aktif_rangkaian7_index = $column_index;
                    break;
                case 'penerapan_nilai_rangkaian7':
                    $penerapan_nilai_rangkaian7_index = $column_index;
                    break;
                case 'aktif_rangkaian8':
                    $aktif_rangkaian8_index = $column_index;
                    break;
                case 'penerapan_nilai_rangkaian8':
                    $penerapan_nilai_rangkaian8_index = $column_index;
                    break;
            }
        }

        if (isset($nim_index) && isset($aktif_rangkaian6_index) && isset($penerapan_nilai_rangkaian6_index)
            && isset($aktif_rangkaian7_index) && isset($penerapan_nilai_rangkaian7_index)
            && isset($aktif_rangkaian8_index) && isset($penerapan_nilai_rangkaian8_index)) {
            $error_row = null;
            try {
                DB::beginTransaction();
                // database queries here
                for ($i = 1; $i < count($spreadsheetArray); $i++) {
                    $data_row = $spreadsheetArray[$i];
                    $error_row = $i;

                    PK2MTourKeaktifan::find($data_row[$nim_index])->update([
                        'aktif_rangkaian6' => $data_row[$aktif_rangkaian6_index],
                        'penerapan_nilai_rangkaian6' => $data_row[$penerapan_nilai_rangkaian6_index],
                        'aktif_rangkaian7' => $data_row[$aktif_rangkaian7_index],
                        'penerapan_nilai_rangkaian7' => $data_row[$penerapan_nilai_rangkaian7_index],
                        'aktif_rangkaian8' => $data_row[$aktif_rangkaian8_index],
                        'penerapan_nilai_rangkaian8' => $data_row[$penerapan_nilai_rangkaian8_index],
                    ]);
                }
                DB::commit();
                return redirect()->back()->with('alert-success', 'Impor nilai berhasil');
            } catch (\PDOException $e) {
                // Woopsy
                DB::rollBack();
                return redirect()->back()->with('alert-error', 'Terjadi kesalahan impor pada baris ' . $error_row . '. Impor dibatalkan!');
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
        $pk2mTourKeaktifan = PK2MTourKeaktifan::find($nim);
        return view('panel-admin.pkm.keaktifan-edit', compact('pk2mTourKeaktifan'));
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
        $dataKeaktifan = PK2MTourKeaktifan::find($nim)->update([
            'aktif_rangkaian6' => $request->aktif_rangkaian6,
            'penerapan_nilai_rangkaian6' => $request->penerapan_nilai_rangkaian6,
            'aktif_rangkaian7' => $request->aktif_rangkaian7,
            'penerapan_nilai_rangkaian7' => $request->penerapan_nilai_rangkaian7,
            'aktif_rangkaian8' => $request->aktif_rangkaian8,
            'penerapan_nilai_rangkaian8' => $request->penerapan_nilai_rangkaian8,
        ]);
        return redirect()->route('panel.kegiatan.pkm.keaktifan.index')->with('alert-success', 'Berhasil mengubah data keaktifan PK2M Tour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $dataKeaktifan = PK2MTourKeaktifan::find($nim)->update([
            'aktif_rangkaian6' => 0,
            'penerapan_nilai_rangkaian6' => 0,
            'aktif_rangkaian7' => 0,
            'penerapan_nilai_rangkaian7' => 0,
            'aktif_rangkaian8' => 0,
            'penerapan_nilai_rangkaian8' => 0,
        ]);
        return redirect()->route('panel.kegiatan.pkm.keaktifan.index')->with('alert-success', 'Berhasil menghapus data keaktifan PK2M Tour');
    }
}
