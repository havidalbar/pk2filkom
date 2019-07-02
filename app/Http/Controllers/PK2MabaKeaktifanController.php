<?php

namespace App\Http\Controllers;

use App\PK2MabaKeaktifan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet;

class PK2MabaKeaktifanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pk2mabaKeaktifans = PK2MabaKeaktifan::all();
        return view('panel-admin.pk2maba.keaktifan-index', ['pk2mabaKeaktifans' => $pk2mabaKeaktifans]);
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
        $uploadedExcel = $request->file('import_pk2maba_keaktifan');

        $reader = new PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $reader->setLoadSheetsOnly('pk2maba_keaktifan');

        /** Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = $reader->load($uploadedExcel->getPathName());
        $spreadsheetArray = $spreadsheet->getActiveSheet()->toArray();

        foreach ($spreadsheetArray[0] as $column_index => $data_key) {
            switch ($data_key) {
                case 'NIM':
                    $nim_index = $column_index;
                    break;
                case 'aktif_rangkaian1':
                    $aktif_rangkaian1_index = $column_index;
                    break;
                case 'penerapan_nilai_rangkaian1':
                    $penerapan_nilai_rangkaian1_index = $column_index;
                    break;
                case 'aktif_rangkaian2':
                    $aktif_rangkaian2_index = $column_index;
                    break;
                case 'penerapan_nilai_rangkaian2':
                    $penerapan_nilai_rangkaian2_index = $column_index;
                    break;
            }
        }

        if (isset($nim_index) && isset($aktif_rangkaian1_index) && isset($penerapan_nilai_rangkaian1_index)
            && isset($aktif_rangkaian2_index) && isset($penerapan_nilai_rangkaian2_index)) {
            $error_row = null;
            try {
                DB::beginTransaction();
                // database queries here
                for ($i = 1; $i < count($spreadsheetArray); $i++) {
                    $data_row = $spreadsheetArray[$i];
                    $error_row = $i;

                    $affected = DB::update('update pk2maba_keaktifan set aktif_rangkaian1 = ?, penerapan_nilai_rangkaian1 = ?, aktif_rangkaian2 = ?, penerapan_nilai_rangkaian2 = ? where nim = ?',
                        [$data_row[$aktif_rangkaian1_index], $data_row[$penerapan_nilai_rangkaian1_index], $data_row[$aktif_rangkaian2_index], $data_row[$penerapan_nilai_rangkaian2_index], $data_row[$nim_index]]);
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
        $pk2mabaKeaktifan = PK2MabaKeaktifan::find($nim);
        return view('panel-admin.pk2maba.keaktifan-edit', compact('pk2mabaKeaktifan'));
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
        $dataKeaktifan = PK2MabaKeaktifan::find($nim)->update([
            'aktif_rangkaian1' => $request->aktif_rangkaian1,
            'penerapan_nilai_rangkaian1' => $request->penerapan_nilai_rangkaian1,
            'aktif_rangkaian2' => $request->aktif_rangkaian2,
            'penerapan_nilai_rangkaian2' => $request->penerapan_nilai_rangkaian2,
        ]);
        return redirect()->route('panel.kegiatan.pk2maba.keaktifan.index')->with('alert', 'Berhasil mengubah data keaktifan PK2Maba');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $dataKeaktifan = PK2MabaKeaktifan::find($nim)->update([
            'aktif_rangkaian1' => 0,
            'penerapan_nilai_rangkaian1' => 0,
            'aktif_rangkaian2' => 0,
            'penerapan_nilai_rangkaian2' => 0,
        ]);
        return redirect()->route('panel.kegiatan.pk2maba.keaktifan.index')->with('alert', 'Berhasil menghapus data keaktifan PK2Maba');
    }
}
