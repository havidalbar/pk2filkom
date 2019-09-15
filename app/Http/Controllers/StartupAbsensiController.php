<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\StartupAbsensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet;
use App\BCC;
use App\Ayodev;
use App\Bios;
use App\Display;
use App\Amd;
use App\Kmk;
use App\Krisma;
use App\Kontribusi;
use App\Kozuoku;
use App\Pmk;
use App\Poros;
use App\Raion;
use App\Robotiik;
use App\Optiik;
use App\TIF;
use App\TI;
use App\SI;
use App\TEKKOM;
use App\PTI;


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

                    StartupAbsensi::find($data_row[$nim_index])->update([
                        'nilai_rangkaian3' => $data_row[$nilai_rangkaian3_index],
                        'nilai_rangkaian4' => $data_row[$nilai_rangkaian4_index],
                        'nilai_rangkaian5' => $data_row[$nilai_rangkaian5_index],
                    ]);
                }
                DB::commit();
                return redirect()->back()->with('alert-success', 'Impor nilai berhasil');
            } catch (\PDOException $e) {
                // Woopsy
                DB::rollBack();
                return redirect()->back()->with('alert-error', 'Terjadi kesalahan impor pada baris ' . $error_row . '. Impor dibatalkan! ' . $e->getMessage());
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
        $startupAbsensi = StartupAbsensi::find($nim);
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
        $dataAbsen = StartupAbsensi::find($nim)->update([
            'nilai_rangkaian3' => $request->nilai_rangkaian3,
            'nilai_rangkaian4' => $request->nilai_rangkaian4,
            'nilai_rangkaian5' => $request->nilai_rangkaian5,
        ]);
        return redirect()->route('panel.kegiatan.startup.absensi.index')->with('alert-success', 'Berhasil mengubah data absensi Startup Academy');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $dataAbsen = StartupAbsensi::find($nim)->update([
            'nilai_rangkaian3' => 0,
            'nilai_rangkaian4' => 0,
            'nilai_rangkaian5' => 0,
        ]);
        return redirect()->route('panel.kegiatan.startup.absensi.index')->with('alert-success', 'Berhasil menghapus data absensi Startup Academy');
    }

    public function absensiOpenHouse(Request $request)
    {
        try {
            if (isset($request->nim_key) && isset($request->booth)) {
                $decrypted = decrypt($request->nim_key);

                $nim = $decrypted;
                $booth = $request->booth;
            } else if (isset($request->nim) && isset($request->booth)) {
                $nim = $request->nim;
                $booth = $request->booth;
            } else {
                return view('panel-admin.startup.absensi-open-house',['alert-success'=>'nim atau password tidak boleh dikosongi']);
            }

            if (is_numeric($nim)) {
                $mahasiswa = Mahasiswa::find($nim);

                if ($mahasiswa) {
                    // $update = StartupAbsensi::where('nim', $nim)->update([
                    //     'nilai_rangkaian4' => 100,
                    // ]);
                    switch($booth){
                        case 'BCC':
                            $cekMhs = BCC::find($nim);
                            if(!$cekMhs){
                                $data = new BCC();
                                $data->nim = $nim;
                                $data->absensi = 100;
                                $data->save();
                                return redirect()->route('panel.kegiatan.startup.absensi.open-house')->with('alert-success', 'Pendataan mahasiswa ' . $nim . ' berhasil dimasukkan');
                            }else{
                                return redirect()->back()->with('alert-success','Maaf nim ini '. $nim . ' telah terdaftar di pendataan booth '. $booth);
                            }
                            break;
                        case 'ROBOTIIK':
                            $cekMhs = Robotiik::find($nim);
                            if(!$cekMhs){
                                $data = new Robotiik();
                                $data->nim = $nim;
                                $data->absensi = 100;
                                $data->save();
                                return redirect()->route('panel.kegiatan.startup.absensi.open-house')->with('alert-success', 'Pendataan mahasiswa ' . $nim . ' berhasil dimasukkan');
                            }else{
                                return redirect()->back()->with('alert-success','Maaf nim ini '. $nim . ' telah terdaftar di pendataan booth '. $booth);
                            }
                            break;
                        case 'DAI KOZUOKU':
                            $cekMhs = Kozuoku::find($nim);
                            if(!$cekMhs){
                                $data = new Kozuoku();
                                $data->nim = $nim;
                                $data->absensi = 100;
                                $data->save();
                                return redirect()->route('panel.kegiatan.startup.absensi.open-house')->with('alert-success', 'Pendataan mahasiswa ' . $nim . ' berhasil dimasukkan');
                            }else{
                                return redirect()->back()->with('alert-success','Maaf nim ini '. $nim . ' telah terdaftar di pendataan booth '. $booth);
                            }
                            break;
                        case 'KONTRIBUSI FILKOM':
                            $cekMhs = Kontribusi::find($nim);
                            if(!$cekMhs){
                                $data = new Kontribusi();
                                $data->nim = $nim;
                                $data->absensi = 100;
                                $data->save();
                                return redirect()->route('panel.kegiatan.startup.absensi.open-house')->with('alert-success', 'Pendataan mahasiswa ' . $nim . ' berhasil dimasukkan');
                            }else{
                                return redirect()->back()->with('alert-success','Maaf nim ini '. $nim . ' telah terdaftar di pendataan booth '. $booth);
                            }
                            break;
                        case 'AYODEV':
                            $cekMhs = Ayodev::find($nim);
                            if(!$cekMhs){
                                $data = new Ayodev();
                                $data->nim = $nim;
                                $data->absensi = 100;
                                $data->save();
                                return redirect()->route('panel.kegiatan.startup.absensi.open-house')->with('alert-success', 'Pendataan mahasiswa ' . $nim . ' berhasil dimasukkan');
                            }else{
                                return redirect()->back()->with('alert-success','Maaf nim ini '. $nim . ' telah terdaftar di pendataan booth '. $booth);
                            }
                            break;
                        case 'PMK':
                            $cekMhs = Pmk::find($nim);
                            if(!$cekMhs){
                                $data = new Pmk();
                                $data->nim = $nim;
                                $data->absensi = 100;
                                $data->save();
                                return redirect()->route('panel.kegiatan.startup.absensi.open-house')->with('alert-success', 'Pendataan mahasiswa ' . $nim . ' berhasil dimasukkan');
                            }else{
                                return redirect()->back()->with('alert-success','Maaf nim ini '. $nim . ' telah terdaftar di pendataan booth '. $booth);
                            }
                            break;
                        case 'KMK':
                            $cekMhs = Kmk::find($nim);
                            if(!$cekMhs){
                                $data = new Kmk();
                                $data->nim = $nim;
                                $data->absensi = 100;
                                $data->save();
                                return redirect()->route('panel.kegiatan.startup.absensi.open-house')->with('alert-success', 'Pendataan mahasiswa ' . $nim . ' berhasil dimasukkan');
                            }else{
                                return redirect()->back()->with('alert-success','Maaf nim ini '. $nim . ' telah terdaftar di pendataan booth '. $booth);
                            }
                            break;
                        case 'POROS':
                            $cekMhs = Poros::find($nim);
                            if(!$cekMhs){
                                $data = new Poros();
                                $data->nim = $nim;
                                $data->absensi = 100;
                                $data->save();
                                return redirect()->route('panel.kegiatan.startup.absensi.open-house')->with('alert-success', 'Pendataan mahasiswa ' . $nim . ' berhasil dimasukkan');
                            }else{
                                return redirect()->back()->with('alert-success','Maaf nim ini '. $nim . ' telah terdaftar di pendataan booth '. $booth);
                            }
                            break;
                        case 'BIOS':
                            $cekMhs = Bios::find($nim);
                            if(!$cekMhs){
                                $data = new Bios();
                                $data->nim = $nim;
                                $data->absensi = 100;
                                $data->save();
                                return redirect()->route('panel.kegiatan.startup.absensi.open-house')->with('alert-success', 'Pendataan mahasiswa ' . $nim . ' berhasil dimasukkan');
                            }else{
                                return redirect()->back()->with('alert-success','Maaf nim ini '. $nim . ' telah terdaftar di pendataan booth '. $booth);
                            }
                            break;
                        case 'RAION':
                            $cekMhs = Raion::find($nim);
                            if(!$cekMhs){
                                $data = new Raion();
                                $data->nim = $nim;
                                $data->absensi = 100;
                                $data->save();
                                return redirect()->route('panel.kegiatan.startup.absensi.open-house')->with('alert-success', 'Pendataan mahasiswa ' . $nim . ' berhasil dimasukkan');
                            }else{
                                return redirect()->back()->with('alert-success','Maaf nim ini '. $nim . ' telah terdaftar di pendataan booth '. $booth);
                            }
                            break;
                        case 'LPM DISPLAY':
                            $cekMhs = Display::find($nim);
                            if(!$cekMhs){
                                $data = new Display();
                                $data->nim = $nim;
                                $data->absensi = 100;
                                $data->save();
                                return redirect()->route('panel.kegiatan.startup.absensi.open-house')->with('alert-success', 'Pendataan mahasiswa ' . $nim . ' berhasil dimasukkan');
                            }else{
                                return redirect()->back()->with('alert-success','Maaf nim ini '. $nim . ' telah terdaftar di pendataan booth '. $booth);
                            }
                            break;
                        case 'LKI AMD':
                            $cekMhs = Amd::find($nim);
                            if(!$cekMhs){
                                $data = new Amd();
                                $data->nim = $nim;
                                $data->absensi = 100;
                                $data->save();
                                return redirect()->route('panel.kegiatan.startup.absensi.open-house')->with('alert-success', 'Pendataan mahasiswa ' . $nim . ' berhasil dimasukkan');
                            }else{
                                return redirect()->back()->with('alert-success','Maaf nim ini '. $nim . ' telah terdaftar di pendataan booth '. $booth);
                            }
                            break;
                        case 'OPTIIK':
                            $cekMhs = Optiik::find($nim);
                            if(!$cekMhs){
                                $data = new Optiik();
                                $data->nim = $nim;
                                $data->absensi = 100;
                                $data->save();
                                return redirect()->route('panel.kegiatan.startup.absensi.open-house')->with('alert-success', 'Pendataan mahasiswa ' . $nim . ' berhasil dimasukkan');
                            }else{
                                return redirect()->back()->with('alert-success','Maaf nim ini '. $nim . ' telah terdaftar di pendataan booth '. $booth);
                            }
                            break;
                        case 'K-RISMA':
                            $cekMhs = Krisma::find($nim);
                            if(!$cekMhs){
                                $data = new Krisma();
                                $data->nim = $nim;
                                $data->absensi = 100;
                                $data->save();
                                return redirect()->route('panel.kegiatan.startup.absensi.open-house')->with('alert-success', 'Pendataan mahasiswa ' . $nim . ' berhasil dimasukkan');
                            }else{
                                return redirect()->back()->with('alert-success','Maaf nim ini '. $nim . ' telah terdaftar di pendataan booth '. $booth);
                            }
                            break;
                        case 'PTI':
                            $cekMhs = PTI::find($nim);
                            if(!$cekMhs){
                                $data = new PTI();
                                $data->nim = $nim;
                                $data->absensi = 100;
                                $data->save();
                                return redirect()->route('panel.kegiatan.startup.absensi.open-house')->with('alert-success', 'Pendataan mahasiswa ' . $nim . ' berhasil dimasukkan');
                            }else{
                                return redirect()->back()->with('alert-success','Maaf nim ini '. $nim . ' telah terdaftar di pendataan booth '. $booth);
                            }
                            break;
                        case 'TI':
                            $cekMhs = TI::find($nim);
                            if(!$cekMhs){
                                $data = new TI();
                                $data->nim = $nim;
                                $data->absensi = 100;
                                $data->save();
                                return redirect()->route('panel.kegiatan.startup.absensi.open-house')->with('alert-success', 'Pendataan mahasiswa ' . $nim . ' berhasil dimasukkan');
                            }else{
                                return redirect()->back()->with('alert-success','Maaf nim ini '. $nim . ' telah terdaftar di pendataan booth '. $booth);
                            }
                            break;
                        case 'SI':
                            $cekMhs = SI::find($nim);
                            if(!$cekMhs){
                                $data = new SI();
                                $data->nim = $nim;
                                $data->absensi = 100;
                                $data->save();
                                return redirect()->route('panel.kegiatan.startup.absensi.open-house')->with('alert-success', 'Pendataan mahasiswa ' . $nim . ' berhasil dimasukkan');
                            }else{
                                return redirect()->back()->with('alert-success','Maaf nim ini '. $nim . ' telah terdaftar di pendataan booth '. $booth);
                            }
                            break;
                        case 'TIF':
                            $cekMhs = TIF::find($nim);
                            if(!$cekMhs){
                                $data = new TIF();
                                $data->nim = $nim;
                                $data->absensi = 100;
                                $data->save();
                                return redirect()->route('panel.kegiatan.startup.absensi.open-house')->with('alert-success', 'Pendataan mahasiswa ' . $nim . ' berhasil dimasukkan');
                            }else{
                                return redirect()->back()->with('alert-success','Maaf nim ini '. $nim . ' telah terdaftar di pendataan booth '. $booth);
                            }
                            break;
                        case 'TEKKOM':
                            $cekMhs = TEKKOM::find($nim);
                            if(!$cekMhs){
                                $data = new TEKKOM();
                                $data->nim = $nim;
                                $data->absensi = 100;
                                $data->save();
                                return redirect()->route('panel.kegiatan.startup.absensi.open-house')->with('alert-success', 'Pendataan mahasiswa ' . $nim . ' berhasil dimasukkan');
                            }else{
                                return redirect()->back()->with('alert-success','Maaf nim ini '. $nim . ' telah terdaftar di pendataan booth '. $booth);
                            }
                            break;
                    }
                } else {
                    return redirect()->route('panel.kegiatan.startup.absensi.open-house')->with('alert-error', 'Mahasiswa tidak ditemukan');
                }
            } else {
                throw new DecryptException;
            }
        } catch (DecryptException $e) {
            return redirect()->route('panel.kegiatan.startup.absensi.open-house')->with('alert-success', 'Kesalahan input atau kode QR');
        } catch (Exception $e) {
            return redirect()->route('panel.kegiatan.startup.absensi.open-house')->with('alert-error', 'Kesalahan pengolahan data');
        }
    }
}
