<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\StartupAbsensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet;

class StartupAbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $startupAbsensis = StartupAbsensi::all();
        return view('panel-admin.startup.absensi-index', compact('startupAbsensis'));
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
        $uploadedExcel = $request->file('import_startup_absensi');

        $reader = new PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $reader->setLoadSheetsOnly('startup_absensi');

        /** Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = $reader->load($uploadedExcel->getPathName());
        $spreadsheetArray = $spreadsheet->getActiveSheet()->toArray();

        foreach ($spreadsheetArray[0] as $column_index => $data_key) {
            switch ($data_key) {
                case 'NIM':
                    $nim_index = $column_index;
                    break;
                case 'nilai_rangkaian3':
                    $nilai_rangkaian3_index = $column_index;
                    break;
                case 'nilai_rangkaian4':
                    $nilai_rangkaian4_index = $column_index;
                    break;
                case 'nilai_rangkaian5':
                    $nilai_rangkaian5_index = $column_index;
                    break;
            }
        }

        if (isset($nim_index) && isset($nilai_rangkaian3_index) && isset($nilai_rangkaian4_index) && isset($nilai_rangkaian5_index)) {
            $error_row = null;
            try {
                DB::beginTransaction();
                // database queries here
                for ($i = 1; $i < count($spreadsheetArray); $i++) {
                    $data_row = $spreadsheetArray[$i];
                    $error_row = $i;

                    $affected = DB::update('update startup_academy_absensi set nilai_rangkaian3 = ?, nilai_rangkaian4 = ?, nilai_rangkaian5 = ? where nim = ?',
                        [$data_row[$nilai_rangkaian3_index], $data_row[$nilai_rangkaian4_index], $data_row[$nilai_rangkaian5_index], $data_row[$nim_index]]);
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
        $startupAbsensi = StartupAbsensi::where('nim', $nim)->first();
        return view('panel-admin.startup.absensi-edit', compact('startupAbsensi'));
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
        $dataAbsen = StartupAbsensi::where('nim', $nim)->update([
            'nilai_rangkaian3' => $request->nilai_rangkaian3,
            'nilai_rangkaian4' => $request->nilai_rangkaian4,
            'nilai_rangkaian5' => $request->nilai_rangkaian5,
        ]);
        return redirect()->route('panel.kegiatan.startup.absensi.index')->with('alert', 'Berhasil mengubah data absensi Startup Academy');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $dataAbsen = StartupAbsensi::where('nim', $nim)->update([
            'nilai_rangkaian3' => 0,
            'nilai_rangkaian4' => 0,
            'nilai_rangkaian5' => 0,
        ]);
        return redirect()->route('panel.kegiatan.startup.absensi.index')->with('alert', 'Berhasil menghapus data absensi Startup Academy');
    }

    public function absensiOpenHouse(Request $request)
    {
        try {
            $decrypted = decrypt($request->nim);

            $mahasiswa = Mahasiswa::where('nim', $decrypted)->first();

            if ($mahasiswa) {
                $update = StartupAbsensi::where('nim', $decrypted)->update([
                    'nilai_rangkaian4' => 100,
				]);
				return response();
            } else {
                abort(404);
            }
        } catch (DecryptException $e) {
            abort(400);
        }
    }
}
