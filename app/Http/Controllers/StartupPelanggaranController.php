<?php

namespace App\Http\Controllers;

use App\StartupPelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet;

class StartupPelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $startupPelanggarans = StartupPelanggaran::all();
        return view('panel-admin.startup.pelanggaran-index', ['startupPelanggarans' => $startupPelanggarans]);
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
        $uploadedExcel = $request->file('import_startup_pelanggaran');

        $reader = new PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $reader->setLoadSheetsOnly('startup_pelanggaran');

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

        if (isset($nim_index) && isset($ringan_index) && isset($sedang_index) && isset($berat_index)) {
            $error_row = null;
            try {
                DB::beginTransaction();
                // database queries here
                for ($i = 1; $i < count($spreadsheetArray); $i++) {
                    $data_row = $spreadsheetArray[$i];
                    $error_row = $i;

                    StartupPelanggaran::find($data_row[$nim_index])->update([
                        'ringan' => $data_row[$ringan_index],
                        'sedang' => $data_row[$sedang_index],
                        'berat' => $data_row[$berat_index],
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
        $startupPelanggaran = StartupPelanggaran::find($nim);
        return view('panel-admin.startup.pelanggaran-edit', compact('startupPelanggaran'));
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
        $dataPelanggaran = StartupPelanggaran::find($nim)->update([
            'ringan' => $request->ringan,
            'sedang' => $request->sedang,
            'berat' => $request->berat,
        ]);
        return redirect()->route('panel.kegiatan.startup.pelanggaran.index')->with('alert-success', 'Berhasil mengubah data pelanggaran Startup Academy');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $dataPelanggaran = StartupPelanggaran::find($nim)->update([
            'ringan' => 0,
            'sedang' => 0,
            'berat' => 0,
        ]);
        return redirect()->route('panel.kegiatan.startup.pelanggaran.index')->with('alert-success', 'Berhasil menghapus data pelanggaran Startup Academy');
    }
}
