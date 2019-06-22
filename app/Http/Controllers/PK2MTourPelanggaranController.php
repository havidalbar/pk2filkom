<?php

namespace App\Http\Controllers;

use App\PK2MTourPelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet;

class PK2MTourPelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pk2mTourPelanggarans = PK2MTourPelanggaran::all();
        return view('panel-admin.pkm.pelanggaran-index', compact('pk2mTourPelanggarans'));
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
        $uploadedExcel = $request->file('import_pk2m_tour_pelanggaran');

        $reader = new PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $reader->setLoadSheetsOnly('pk2m_tour_pelanggaran');

        /** Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = $reader->load($uploadedExcel->getPathName());
        $spreadsheetArray = $spreadsheet->getActiveSheet()->toArray();

        foreach ($spreadsheetArray[0] as $column_index => $data_key) {
            switch ($data_key) {
                case 'NIM':
                    $nim_index = $column_index;
                    break;
                case 'ringan':
                    $ringan_index = $column_index;
                    break;
                case 'sedang':
                    $sedang_index = $column_index;
                    break;
                case 'berat':
                    $berat_index = $column_index;
                    break;
            }
        }

        if (isset($nim_index) && isset($ringan_index) && isset($sedang_index)&& isset($berat_index)) {
            $error_row = null;
            try {
                DB::beginTransaction();
                // database queries here
                for ($i = 1; $i < count($spreadsheetArray); $i++) {
                    $data_row = $spreadsheetArray[$i];
					$error_row = $i;

                    $affected = DB::update('update pk2maba_tour_pelanggaran set ringan = ?, sedang = ?, berat = ? where nim = ?',
                        [$data_row[$ringan_index], $data_row[$sedang_index], $data_row[$berat_index], $data_row[$nim_index]]);
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
        $pk2mTourPelanggaran = PK2MTourPelanggaran::where('nim', $nim)->first();
        return view('panel-admin.pkm.pelanggaran-edit', compact('pk2mTourPelanggaran'));
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
        $dataPelanggaran = PK2MTourPelanggaran::where('nim', $nim)->update([
            'ringan' => $request->ringan,
            'sedang' => $request->sedang,
            'berat' => $request->berat,
        ]);
        return redirect()->route('panel.kegiatan.pkm.pelanggaran.index')->with('alert', 'Berhasil mengubah data keaktifan PK2M Tour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $dataPelanggaran = PK2MTourPelanggaran::where('nim', $nim)->update([
            'ringan' => 0,
            'sedang' => 0,
            'berat' => 0,
        ]);
        return redirect()->route('panel.kegiatan.pkm.pelanggaran.index')->with('alert', 'Berhasil menghapus data keaktifan PK2M Tour');
    }
}
