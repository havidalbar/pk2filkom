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
        $dataMahasiswa = Mahasiswa::find($nim);
        $dataMahasiswa->kelompok = $request->kelompok;
        $dataMahasiswa->cluster = $request->cluster;
        $dataMahasiswa->save();
        return redirect()->route('panel.mahasiswa.biodata')->with('alert-success', 'Berhasil mengubah data mahasiswa');
    }

    public function importClusterKelompok(Request $request)
    {
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
                    if (!$mahasiswa) {
                        continue;
                    } else {
                        $mahasiswa->cluster = $data_row[$cluster_index];
                        $mahasiswa->kelompok = $data_row[$kelompok_index];
                        $mahasiswa->save();
                    }
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

    public function importMahasiswa(Request $request)
    {
        $uploadedExcel = $request->file('import_mahasiswa');

        $reader = new PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $reader->setLoadSheetsOnly('CLUSTERING');

        /** Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = $reader->load($uploadedExcel->getPathName());
        $spreadsheetArray = $spreadsheet->getActiveSheet()->toArray();

        foreach ($spreadsheetArray[0] as $column_index => $data_key) {
            switch ($data_key) {
                case 'NIM':
                    $nim_index = $column_index;
                    break;
                case 'NAMA':
                    $nama_index = $column_index;
                    break;
                case 'JENIS KELAMIN':
                    $jk_index = $column_index;
                    break;
            }
        }


        if (isset($nim_index) && isset($nama_index) && isset($jk_index)) {
            $error_row = null;
            try {
                DB::beginTransaction();
                // database queries here
                for ($i = 1; $i < count($spreadsheetArray); $i++) {
                    $data_row = $spreadsheetArray[$i];
                    $error_row = $i;
                    if ($data_row[$nim_index]) {
                        $mahasiswa = Mahasiswa::find($data_row[$nim_index]);
                        if ($mahasiswa) {
                            continue;
                        } else {
                            $mahasiswa = new Mahasiswa;
                            $mahasiswa->nim = $data_row[$nim_index];
                            $mahasiswa->nama = $data_row[$nama_index];
                            $mahasiswa->jenis_kelamin = $data_row[$jk_index] == 'L' ? 1 : 2;
                            $mahasiswa->save();
                            $mahasiswa = Mahasiswa::find($data_row[$nim_index]);
                            $mahasiswa->prodi = ((string) $mahasiswa->nim)[6];
                            $mahasiswa->save();
                            \App\PK2MabaAbsensi::create(['nim' => $mahasiswa->nim]);
                            \App\PK2MabaKeaktifan::create(['nim' => $mahasiswa->nim]);
                            \App\PK2MabaPelanggaran::create(['nim' => $mahasiswa->nim]);
                            \App\PK2MTourAbsensi::create(['nim' => $mahasiswa->nim]);
                            \App\PK2MTourKeaktifan::create(['nim' => $mahasiswa->nim]);
                            \App\PK2MTourPelanggaran::create(['nim' => $mahasiswa->nim]);
                            \App\StartupAbsensi::create(['nim' => $mahasiswa->nim]);
                            \App\StartupKeaktifan::create(['nim' => $mahasiswa->nim]);
                            \App\StartupPelanggaran::create(['nim' => $mahasiswa->nim]);
                            \App\ProdiFinal::create(['nim' => $mahasiswa->nim]);
                        }
                        unset($mahsiswa);
                    }
                }
                DB::commit();
                return redirect()->back()->with('alert-success', 'Impor mahasiswa berhasil');
            } catch (\PDOException $e) {
                // Woopsy
                DB::rollBack();
                return redirect()->back()->with('alert-error', 'Terjadi kesalahan impor pada baris ' . $error_row . '. Impor dibatalkan! ' . $e->getMessage());
            }
        } else {
            return redirect()->back()->with('alert-error', 'Terjadi kesalahan format!');
        }
    }
}
