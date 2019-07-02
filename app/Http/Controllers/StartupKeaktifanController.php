<?php

namespace App\Http\Controllers;

use App\StartupKeaktifan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet;

class StartupKeaktifanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $startupKeaktifans = StartupKeaktifan::all();
        return view('panel-admin.startup.keaktifan-index', ['startupKeaktifans' => $startupKeaktifans]);
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
        $uploadedExcel = $request->file('import_startup_keaktifan');

        $reader = new PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $reader->setLoadSheetsOnly('startup_keaktifan');

        /** Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = $reader->load($uploadedExcel->getPathName());
        $spreadsheetArray = $spreadsheet->getActiveSheet()->toArray();

        foreach ($spreadsheetArray[0] as $column_index => $data_key) {
            switch ($data_key) {
                case 'NIM':
                    $nim_index = $column_index;
                    break;
                case 'aktif_rangkaian3':
                    $aktif_rangkaian3_index = $column_index;
                    break;
                case 'penerapan_nilai_rangkaian3':
                    $penerapan_nilai_rangkaian3_index = $column_index;
                    break;
                case 'aktif_rangkaian4':
                    $aktif_rangkaian4_index = $column_index;
                    break;
                case 'penerapan_nilai_rangkaian4':
                    $penerapan_nilai_rangkaian4_index = $column_index;
                    break;
                case 'aktif_rangkaian5':
                    $aktif_rangkaian5_index = $column_index;
                    break;
                case 'penerapan_nilai_rangkaian5':
                    $penerapan_nilai_rangkaian5_index = $column_index;
                    break;
            }
        }

        if (isset($nim_index) && isset($aktif_rangkaian3_index) && isset($penerapan_nilai_rangkaian3_index)
            && isset($aktif_rangkaian4_index) && isset($penerapan_nilai_rangkaian4_index)
            && isset($aktif_rangkaian5_index) && isset($penerapan_nilai_rangkaian5_index)) {
            $error_row = null;
            try {
                DB::beginTransaction();
                // database queries here
                for ($i = 1; $i < count($spreadsheetArray); $i++) {
                    $data_row = $spreadsheetArray[$i];
                    $error_row = $i;

                    $affected = DB::update('update startup_academy_keaktifan set aktif_rangkaian3 = ?, penerapan_nilai_rangkaian3 = ?, aktif_rangkaian4 = ?, penerapan_nilai_rangkaian4 = ?, aktif_rangkaian5 = ?, penerapan_nilai_rangkaian5 = ? where nim = ?',
                        [$data_row[$aktif_rangkaian3_index], $data_row[$penerapan_nilai_rangkaian3_index], $data_row[$aktif_rangkaian4_index], $data_row[$penerapan_nilai_rangkaian4_index], $data_row[$aktif_rangkaian5_index], $data_row[$penerapan_nilai_rangkaian5_index], $data_row[$nim_index]]);
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
        $startupKeaktifan = StartupKeaktifan::find($nim);
        return view('panel-admin.startup.keaktifan-edit', compact('startupKeaktifan'));
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
        $dataKeaktifan = StartupKeaktifan::find($nim)->update([
            'aktif_rangkaian3' => $request->aktif_rangkaian3,
            'penerapan_nilai_rangkaian3' => $request->penerapan_nilai_rangkaian3,
            'aktif_rangkaian4' => $request->aktif_rangkaian4,
            'penerapan_nilai_rangkaian4' => $request->penerapan_nilai_rangkaian4,
            'aktif_rangkaian5' => $request->aktif_rangkaian5,
            'penerapan_nilai_rangkaian5' => $request->penerapan_nilai_rangkaian5,
        ]);
        return redirect()->route('panel.kegiatan.startup.keaktifan.index')->with('alert', 'Berhasil mengubah data keaktifan Startup Academy');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $dataKeaktifan = StartupKeaktifan::find($nim)->update([
            'aktif_rangkaian3' => 0,
            'penerapan_nilai_rangkaian3' => 0,
            'aktif_rangkaian4' => 0,
            'penerapan_nilai_rangkaian4' => 0,
            'aktif_rangkaian5' => 0,
            'penerapan_nilai_rangkaian5' => 0,
        ]);
        return redirect()->route('panel.kegiatan.startup.keaktifan.index')->with('alert', 'Berhasil menghapus data keaktifan Startup Academy');
    }
}
