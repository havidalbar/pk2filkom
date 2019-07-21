<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet;

class PanelMahasiswaController extends Controller
{
    public function getBiodata()
    {
        $mahasiswas = Mahasiswa::all();
        return view('panel-admin.mahasiswa.biodata', compact('mahasiswas'));
    }

    public function getKesehatan()
    {
        $mahasiswas = Mahasiswa::all();
        return view('panel-admin.mahasiswa.kesehatan', compact('mahasiswas'));
    }

    public function editBiodataByAdmin($nim)
    {
        $dataMahasiswa = Mahasiswa::find($nim);
        return view('panel-admin.mahasiswa.edit-biodata', ['dataMahasiswa' => $dataMahasiswa]);
    }

    public function updateBiodataByAdmin(Request $request, $nim)
    {
        $dataMahasiswa = Mahasiswa::find($nim)->update(['kelompok' => $request->kelompok, 'cluster' => $request->cluster]);
        return redirect()->route('panel.mahasiswa.biodata')->with('alert-success', 'Berhasil mengubah data mahasiswa');
    }

    public function importClusterKelompok(Request $request){
        $uploadedExcel = $request->file('import_cluster');

        $reader = new PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $reader->setLoadSheetsOnly('cluster_kelompok');

        /** Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = $reader->load($uploadedExcel->getPathName());
        $spreadsheetArray = $spreadsheet->getActiveSheet()->toArray();

        foreach ($spreadsheetArray[0] as $column_index => $data_key) {
            switch ($data_key) {
                case 'NIM':
                    $nim_index = $column_index;
                    break;
                case 'Cluster':
                    $cluster_index = $column_index;
                    break;
                case 'Kelompok':
                    $kelompok_index = $column_index;
                    break;
            }
        }

        if (isset($nim_index) && isset($cluster_index) && isset($kelompok_index)) {
            $error_row = null;
            try {
                DB::beginTransaction();
                // database queries here
                for ($i = 1; $i < count($spreadsheetArray); $i++) {
                    $data_row = $spreadsheetArray[$i];
                    $error_row = $i;

                    $mahasiswa = Mahasiswa::find($data_row[$nim_index]);
                    $mahasiswa->cluster = $data_row[$cluster_index];
                    $mahasiswa->kelompok = $data_row[$kelompok_index];
                    $mahasiswa->save();
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
}
