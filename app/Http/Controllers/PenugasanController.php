<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenugasanRequest;
use App\JawabanBeta;
use App\Mahasiswa;
use App\PenilaianBeta;
use App\PenugasanBeta;
use App\PenugasanJawabanBeta;
use App\PenugasanSoalBeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet;

class PenugasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penugasans = PenugasanBeta::withCount(['soal'])->get();
        return view('panel-admin.tugas.index', compact('penugasans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel-admin.tugas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PenugasanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenugasanRequest $request)
    {
        $uploadPath = public_path() . '/uploads/';
        $uploadQueue = [];

        DB::beginTransaction();
        try {
            $penugasan = new PenugasanBeta;

            $slug = substr(str_slug($request->judul), 0, 180);
            $latestSlug = PenugasanBeta::where('slug', 'LIKE', $slug . '%')
                ->orderBy('slug', 'DESC')->first(['slug']);

            if ($latestSlug) {
                $slug_element = explode('-', $latestSlug->slug);
                $latestSlugNumber = end($slug_element);

                if (is_numeric($latestSlugNumber)) {
                    $penugasan->slug = $slug . '-' . ($latestSlugNumber + 1);
                } else {
                    $penugasan->slug = $slug . '-1';
                }
            } else {
                $penugasan->slug = $slug;
            }

            $penugasan->judul = $request->judul;

            $dom = new \domdocument();
            libxml_use_internal_errors(true);
            $dom->loadHtml(urldecode($request->deskripsi));
            $images = $dom->getelementsbytagname('img');

            //loop over img elements, decode their base64 src and save them to public folder,
            //and then replace base64 src with stored image URL.
            foreach ($images as $k => $img) {
                $data = $img->getattribute('src');

                if (strpos($data, ';') !== false) {
                    list($type, $data) = explode(';', $data);
                    list(, $data) = explode(',', $data);

                    $data = base64_decode($data);
                    // $image_name = time() . $k . '.png';
                    $image_extension = str_replace('data:image/', '', $type);
                    $image_name = uniqid() . '.' . $image_extension;

                    file_put_contents($uploadPath . 'penugasan/' . $image_name, $data);
                    $uploadQueue[] = $uploadPath . 'penugasan/' . $image_name;

                    $img->removeattribute('src');
                    $img->setattribute('src', asset('/uploads/penugasan/' . $image_name));
                }
            }

            $penugasan->random = $request->random ? true : false;
            $penugasan->jenis = $request->jenis;
            $penugasan->waktu_tampil = $request->waktu_tampil;
            $penugasan->waktu_mulai = $request->waktu_mulai;
            $penugasan->waktu_akhir = $request->waktu_akhir;
            $penugasan->batas_waktu = $request->batas_waktu ? $request->batas_waktu : null;
            $penugasan->deskripsi = $dom->savehtml();

            $penugasan->save();

            switch ($request->jenis) {
                case 5:
                    break;
                case 7:
                    $soalBidang = new PenugasanSoalBeta;
                    $soalBidang->id_penugasan = $penugasan->id;
                    $soalBidang->soal = 'Bidang PKM';
                    $soalBidang->index = 0;
                    $soalBidang->save();

                    $soalAbstraksi = new PenugasanSoalBeta;
                    $soalAbstraksi->id_penugasan = $penugasan->id;
                    $soalAbstraksi->soal = 'Abstraksi PKM';
                    $soalAbstraksi->index = 1;
                    $soalAbstraksi->save();
                    break;
                default:
                    for ($i = 0; $i < count($request->soal); $i++) {
                        $soal = new PenugasanSoalBeta;

                        if ($request->jenis == 4) {
                            $dom = new \domdocument();
                            libxml_use_internal_errors(true);
                            $dom->loadHtml(urldecode($request->soal[$i]['soal']));
                            $images = $dom->getelementsbytagname('img');

                            //loop over img elements, decode their base64 src and save them to public folder,
                            //and then replace base64 src with stored image URL.
                            foreach ($images as $k => $img) {
                                $data = $img->getattribute('src');

                                if (strpos($data, ';') !== false) {
                                    list($type, $data) = explode(';', $data);
                                    list(, $data) = explode(',', $data);

                                    $data = base64_decode($data);
                                    // $image_name = time() . $k . '.png';
                                    $image_extension = str_replace('data:image/', '', $type);
                                    $image_name = uniqid() . '.' . $image_extension;

                                    file_put_contents($uploadPath . 'penugasan/' . $image_name, $data);
                                    $uploadQueue[] = $uploadPath . 'penugasan/' . $image_name;

                                    $img->removeattribute('src');
                                    $img->setattribute('src', asset('/uploads/penugasan/' . $image_name));
                                }
                            }
                            $soal->soal = $dom->savehtml();
                        } else {
                            $soal->soal = $request->soal[$i]['soal'];
                        }

                        $soal->id_penugasan = $penugasan->id;
                        $soal->index = $i;
                        $soal->save();

                        if ($penugasan->jenis == 4) {
                            // TODO : Masukkan jawaban
                            $submitted_pilihan_jawaban = [];
                            foreach ($request->soal[$i]['pilihan_jawaban'] as $pji => $pj) {
                                $pilihan_jawaban = new PenugasanJawabanBeta;

                                $dom = new \domdocument();
                                libxml_use_internal_errors(true);
                                $dom->loadHtml(urldecode($pj));
                                $images = $dom->getelementsbytagname('img');

                                //loop over img elements, decode their base64 src and save them to public folder,
                                //and then replace base64 src with stored image URL.
                                foreach ($images as $k => $img) {
                                    $data = $img->getattribute('src');

                                    if (strpos($data, ';') !== false) {
                                        list($type, $data) = explode(';', $data);
                                        list(, $data) = explode(',', $data);

                                        $data = base64_decode($data);
                                        // $image_name = time() . $k . '.png';
                                        $image_extension = str_replace('data:image/', '', $type);
                                        $image_name = uniqid() . '.' . $image_extension;

                                        file_put_contents($uploadPath . 'penugasan/' . $image_name, $data);
                                        $uploadQueue[] = $uploadPath . 'penugasan/' . $image_name;

                                        $img->removeattribute('src');
                                        $img->setattribute('src', asset('/uploads/penugasan/' . $image_name));
                                    }
                                }

                                $pilihan_jawaban->id_soal = $soal->id;
                                $pilihan_jawaban->pilihan_jawaban = $dom->savehtml();
                                $pilihan_jawaban->index = $pji;

                                $pilihan_jawaban->save();
                                $submitted_pilihan_jawaban[] = $pilihan_jawaban;
                            }

                            $soal->id_jawaban_benar = $submitted_pilihan_jawaban[$request->soal[$i]['jawaban_benar']]->id;
                            $soal->save();
                        }
                    }
                    break;
            }
            DB::commit();

            return redirect()->route('panel.penugasan.index')->with('alert-success', 'Penugasan berhasil dibuat');
        } catch (\Exception $ex) {
            DB::rollBack();

            foreach ($uploadQueue as $uploaded) {
                if (file_exists($uploaded)) {
                    unlink($uploaded);
                }
            }

            dd($ex);
            return redirect()->back()->withInput()->with('alert-error', 'Terjadi kesalahan data!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $penugasan = PenugasanBeta::where('slug', $slug)->first();
        return view('panel-admin.tugas.edit', compact('penugasan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PenugasanRequest  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(PenugasanRequest $request, $slug)
    {
        // dd($request->deskripsi);

        $penugasan = PenugasanBeta::where('slug', $slug)->first();

        if ($penugasan) {
            $uploadPath = public_path() . '/uploads/';
            $uploadQueue = [];

            DB::beginTransaction();
            try {
                if (str_slug($request->judul) != str_slug($penugasan->judul)) {
                    $slug = substr(str_slug($request->judul), 0, 180);
                    $latestSlug = PenugasanBeta::where('slug', 'LIKE', $slug . '%')
                        ->orderBy('slug', 'DESC')->first(['slug']);

                    if ($latestSlug) {
                        $slug_element = explode('-', $latestSlug->slug);
                        $latestSlugNumber = end($slug_element);

                        if (is_numeric($latestSlugNumber)) {
                            $penugasan->slug = $slug . '-' . ($latestSlugNumber + 1);
                        } else {
                            $penugasan->slug = $slug . '-1';
                        }
                    } else {
                        $penugasan->slug = $slug;
                    }
                }

                $penugasan->judul = $request->judul;

                $dom = new \domdocument();
                libxml_use_internal_errors(true);
                $dom->loadHtml(urldecode($request->deskripsi));
                $images = $dom->getelementsbytagname('img');

                //loop over img elements, decode their base64 src and save them to public folder,
                //and then replace base64 src with stored image URL.
                foreach ($images as $k => $img) {
                    $data = $img->getattribute('src');

                    if (strpos($data, ';') !== false) {
                        list($type, $data) = explode(';', $data);
                        list(, $data) = explode(',', $data);

                        $data = base64_decode($data);
                        // $image_name = time() . $k . '.png';
                        $image_extension = str_replace('data:image/', '', $type);
                        $image_name = uniqid() . '.' . $image_extension;

                        file_put_contents($uploadPath . 'penugasan/' . $image_name, $data);
                        $uploadQueue[] = $uploadPath . 'penugasan/' . $image_name;

                        $img->removeattribute('src');
                        $img->setattribute('src', asset('/uploads/penugasan/' . $image_name));
                    }
                }

                $penugasan->random = $request->random ? true : false;
                $penugasan->waktu_tampil = $request->waktu_tampil;
                $penugasan->waktu_mulai = $request->waktu_mulai;
                $penugasan->waktu_akhir = $request->waktu_akhir;
                $penugasan->batas_waktu = $request->batas_waktu ? $request->batas_waktu : null;
                $penugasan->deskripsi = $dom->savehtml();

                $penugasan->save();

                if ($request->jenis != 5 && $request->jenis != 7) {
                    $soals = $penugasan->soal;
                    for ($i = 0; $i < count($request->soal); $i++) {
                        $soal = $soals[$i];

                        if ($request->jenis == 4) {
                            $dom = new \domdocument();
                            libxml_use_internal_errors(true);
                            $dom->loadHtml(urldecode($request->soal[$i]['soal']));
                            $images = $dom->getelementsbytagname('img');

                            //loop over img elements, decode their base64 src and save them to public folder,
                            //and then replace base64 src with stored image URL.
                            foreach ($images as $k => $img) {
                                $data = $img->getattribute('src');

                                if (strpos($data, ';') !== false) {
                                    list($type, $data) = explode(';', $data);
                                    list(, $data) = explode(',', $data);

                                    $data = base64_decode($data);
                                    // $image_name = time() . $k . '.png';
                                    $image_extension = str_replace('data:image/', '', $type);
                                    $image_name = uniqid() . '.' . $image_extension;

                                    file_put_contents($uploadPath . 'penugasan/' . $image_name, $data);
                                    $uploadQueue[] = $uploadPath . 'penugasan/' . $image_name;

                                    $img->removeattribute('src');
                                    $img->setattribute('src', asset('/uploads/penugasan/' . $image_name));
                                }
                            }
                            $soal->soal = $dom->savehtml();
                        } else {
                            $soal->soal = $request->soal[$i]['soal'];
                        }

                        $soal->save();

                        if ($penugasan->jenis == 4) {
                            // TODO : Masukkan jawaban
                            $submitted_pilihan_jawaban = [];
                            $piljaws = $soal->pilihan_jawaban;
                            foreach ($request->soal[$i]['pilihan_jawaban'] as $pji => $pj) {
                                $pilihan_jawaban = $piljaws[$pji];

                                $dom = new \domdocument();
                                libxml_use_internal_errors(true);
                                $dom->loadHtml(urldecode($pj));
                                $images = $dom->getelementsbytagname('img');

                                //loop over img elements, decode their base64 src and save them to public folder,
                                //and then replace base64 src with stored image URL.
                                foreach ($images as $k => $img) {
                                    $data = $img->getattribute('src');

                                    if (strpos($data, ';') !== false) {
                                        list($type, $data) = explode(';', $data);
                                        list(, $data) = explode(',', $data);

                                        $data = base64_decode($data);
                                        // $image_name = time() . $k . '.png';
                                        $image_extension = str_replace('data:image/', '', $type);
                                        $image_name = uniqid() . '.' . $image_extension;

                                        file_put_contents($uploadPath . 'penugasan/' . $image_name, $data);
                                        $uploadQueue[] = $uploadPath . 'penugasan/' . $image_name;

                                        $img->removeattribute('src');
                                        $img->setattribute('src', asset('/uploads/penugasan/' . $image_name));
                                    }
                                }

                                $pilihan_jawaban->pilihan_jawaban = $dom->savehtml();
                                $pilihan_jawaban->save();
                                $submitted_pilihan_jawaban[] = $pilihan_jawaban;
                            }

                            $soal->id_jawaban_benar = $submitted_pilihan_jawaban[$request->soal[$i]['jawaban_benar']]->id;
                            $soal->save();
                        }
                    }
                }
                DB::commit();

                return redirect()->route('panel.penugasan.index')->with('alert-success', 'Penugasan berhasil diubah');
            } catch (\Exception $ex) {
                DB::rollBack();

                foreach ($uploadQueue as $uploaded) {
                    if (file_exists($uploaded)) {
                        unlink($uploaded);
                    }
                }

                return redirect()->back()->withInput()->with('alert-error', 'Terjadi kesalahan data!');
            }
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $penugasan = PenugasanBeta::where('slug', $slug)->with('soal')->first();

        if ($penugasan) {
            $penugasan->delete();

            return redirect()->route('panel.penugasan.index')->with('alert-success', 'Penugasan berhasil dihapus');
        } else {
            abort(404);
        }
    }

    public function viewJawaban($slug)
    {
        $penugasan = PenugasanBeta::where('slug', $slug)->with('soal')->withCount(['soal'])->first();

        if ($penugasan) {
            $idSoal = [];
            foreach ($penugasan->soal as $soal) {
                $idSoal[] = $soal->id;
            }

            $mahasiswas = Mahasiswa::with(['jawaban' => function ($query) use ($idSoal) {
                return $query->whereIn('id_soal', $idSoal);
            }])->get();

            switch ($penugasan->jenis) {
                case '1':
                case '2':
                    return view('panel-admin.tugas.jawaban.igyt', compact('penugasan', 'mahasiswas'));
                case '6':
                    foreach ($mahasiswas as $mahasiswa) {
                        $jumlahJawabanBenar = 0;
                        foreach ($penugasan->soal as $soal) {
                            foreach ($mahasiswa->jawaban as $jawaban) {
                                if ($jawaban->id_soal == $soal->id) {
                                    $jawabanSoalIni = $jawaban;
                                }
                            }

                            if (isset($jawabanSoalIni) && strtoupper($jawabanSoalIni->jawaban) == strtoupper($soal->soal->jawaban)) {
                                $jumlahJawabanBenar++;
                            }

                            unset($jawabanSoalIni);
                        }

                        $mahasiswa['nilai_' . $penugasan->slug] = $jumlahJawabanBenar / $penugasan->soal_count * 100;
                    }

                    return view('panel-admin.tugas.jawaban.tts-index', compact('penugasan', 'mahasiswas'));
                default:
                    abort(400);
            }
        } else {
            abort(404);
        }
    }

    public function detailJawaban($slug, $nim)
    {
        $penugasan = PenugasanBeta::where('slug', $slug)->with('soal')->withCount(['soal'])->first();
        $mahasiswa = Mahasiswa::find($nim);

        if ($penugasan && $mahasiswa) {

            switch ($penugasan->jenis) {
                case '6':
                    $soalTts = $penugasan->soal;
                    $menuruns = [];
                    $mendatars = [];

                    $jawabans = JawabanBeta::where([
                        'nim' => $nim
                    ])->whereHas('soal', function ($query) use ($penugasan) {
                        $query->where('id_penugasan', $penugasan->id);
                    })->get();

                    foreach ($soalTts as $index => $soal) {
                        $decodedSoal = $soal->soal;

                        foreach ($jawabans as $jawaban) {
                            if ($jawaban->id_soal === $soal->id) {
                                $submittedJawaban = $jawaban;
                                break;
                            }
                        }

                        if (isset($submittedJawaban) && $submittedJawaban->jawaban) {
                            $decodedSoal->jawaban = $submittedJawaban->jawaban;
                        } else {
                            $panjang = ($decodedSoal->tipe == 'menurun'
                                ? $decodedSoal->posisi->endx - $decodedSoal->posisi->startx
                                : $decodedSoal->posisi->endy - $decodedSoal->posisi->starty) + 1;

                            $tempJawaban = '';
                            for ($i = 0; $i < $panjang; $i++) {
                                $tempJawaban = $tempJawaban . '_';
                            }

                            $decodedSoal->jawaban = $tempJawaban;
                        }

                        $decodedSoal->noSoal = $index + 1;
                        if ($decodedSoal->tipe == 'menurun') {
                            $menuruns[] = $decodedSoal;
                        } else if ($decodedSoal->tipe == 'mendatar') {
                            $mendatars[] = $decodedSoal;
                        }

                        unset($submittedJawaban);
                    }

                    $menuruns = json_encode($menuruns);
                    $mendatars = json_encode($mendatars);

                    // dd($menuruns, $mendatars);
                    return view('panel-admin.tugas.jawaban.tts-detail', compact('penugasan', 'mahasiswa', 'jawabans', 'menuruns', 'mendatars'));
                default:
                    abort(400);
            }
        } else {
            abort(404);
        }
    }

    public function imporNilai(Request $request, $slug)
    {
        $penugasan = PenugasanBeta::where('slug', $slug)->first();
        if ($penugasan) {
            if ($penugasan->jenis != 3 && $penugasan->jenis != 5 || $penugasan->jenis != 6) {
                $uploadedExcel = $request->file('nilai_penugasan');

                $reader = new PhpSpreadsheet\Reader\Xlsx();
                $reader->setReadDataOnly(true);
                $reader->setLoadSheetsOnly('nilai_penugasan_' . $penugasan->slug);

                /** Load $inputFileName to a Spreadsheet Object  **/
                $spreadsheet = $reader->load($uploadedExcel->getPathName());
                $spreadsheetArray = $spreadsheet->getActiveSheet()->toArray();

                foreach ($spreadsheetArray[0] as $column_index => $data_key) {
                    switch ($data_key) {
                        case 'NIM':
                            $nim_index = $column_index;
                            break;
                        case 'nilai':
                            $nilai_index = $column_index;
                            break;
                    }
                }

                if (isset($nim_index) && isset($nilai_index)) {
                    $error_row = null;
                    try {
                        DB::beginTransaction();
                        // database queries here
                        for ($i = 1; $i < count($spreadsheetArray); $i++) {
                            $data_row = $spreadsheetArray[$i];
                            $error_row = $i;

                            $nilaiMahasiswa = PenilaianBeta::where([
                                'nim' => $data_row[$nim_index],
                                'id_penugasan' => $penugasan->id
                            ])->first();

                            if ($nilaiMahasiswa) {
                                $nilaiMahasiswa->update([
                                    'nilai' => $data_row[$nilai_index]
                                ]);
                            } else {
                                $nilaiMahasiswa = new PenilaianBeta;
                                $nilaiMahasiswa->nim = $data_row[$nim_index];
                                $nilaiMahasiswa->id_penugasan = $penugasan->id;
                                $nilaiMahasiswa->nilai = $data_row[$nilai_index];
                                $nilaiMahasiswa->save();
                            }
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
            } else {
                abort(500);
            }
        } else {
            abort(404);
        }
    }
}
