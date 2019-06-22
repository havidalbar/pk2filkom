<?php

namespace App\Http\Controllers;

use App\ProdiFinal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet;

class ProdiFinalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodiFinals = ProdiFinal::all();
        return view('panel-admin.prodi-final.index', ['prodiFinals' => $prodiFinals]);
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
        $uploadedExcel = $request->file('import_prodi_final');

        $reader = new PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $reader->setLoadSheetsOnly('prodi_final');

        /** Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = $reader->load($uploadedExcel->getPathName());
        $spreadsheetArray = $spreadsheet->getActiveSheet()->toArray();

        foreach ($spreadsheetArray[0] as $column_index => $data_key) {
            switch ($data_key) {
                case 'NIM':
                    $nim_index = $column_index;
                    break;
                case 'nilai_full':
                    $nilai_full_index = $column_index;
                    break;
            }
        }

        if (isset($nim_index) && isset($nilai_full_index)) {
            $error_row = null;
            try {
                DB::beginTransaction();
                // database queries here
                for ($i = 1; $i < count($spreadsheetArray); $i++) {
                    $data_row = $spreadsheetArray[$i];
					$error_row = $i;

                    $affected = DB::update('update prodi_final set nilai_full = ? where nim = ?',
                        [$data_row[$nilai_full_index], $data_row[$nim_index]]);
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
        $prodiFinal = ProdiFinal::where('nim', $nim)->first();
        return view('panel-admin.prodi-final.edit', compact('prodiFinal'));
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
        $prodiFinal = ProdiFinal::where('nim', $nim)->update([
            'nilai_full' => $request->nilai_prodi,
        ]);
        return redirect()->route('panel.kegiatan.prodi.index')->with('alert', 'Berhasil mengubah data nilai Prodi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $prodiFinal = ProdiFinal::where('nim', $nim)->update([
            'nilai_full' => 0,
        ]);
        return redirect()->route('panel.kegiatan.prodi.index')->with('alert', 'Berhasil mengubah data nilai Prodi');
    }
}
