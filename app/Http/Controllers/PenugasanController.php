<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenugasanRequest;
use App\PenugasanBeta;
use App\PenugasanJawabanBeta;
use App\PenugasanSoalBeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenugasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penugasans = PenugasanBeta::all();
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
                ->orderBy('slug', 'DESC')->first('slug');

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
            $dom->loadHtml($request->deskripsi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
            $penugasan->waktu_mulai = $request->waktu_mulai;
            $penugasan->waktu_akhir = $request->waktu_akhir;
            $penugasan->batas_waktu = $request->batas_waktu ? $request->batas_waktu : null;
            $penugasan->deskripsi = $dom->savehtml();

            $penugasan->save();

            for ($i = 0; $i < count($request->soal); $i++) {
                $soal = new PenugasanSoalBeta;

                if ($request->jenis == 2) {
                    $dom = new \domdocument();
                    $dom->loadHtml($request->soal[$i]['soal'], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
				// $soal->index = 
                $soal->save();

                if ($penugasan->jenis == 2) {
                    // TODO : Masukkan jawaban
                    $submitted_pilihan_jawaban = [];
                    foreach ($request->soal[$i]['pilihan_jawaban'] as $pj) {
                        $pilihan_jawaban = new PenugasanJawabanBeta;

                        $dom = new \domdocument();
                        $dom->loadHtml($pj, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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

                        $pilihan_jawaban->save();
                        $submitted_pilihan_jawaban[] = $pilihan_jawaban;
                    }

                    $soal->id_jawaban_benar = $submitted_pilihan_jawaban[$request->soal[$i]['jawaban_benar']]->id;
                    $soal->save();
                }
            }
            DB::commit();

            return redirect()->route('panel.penugasan.index')->with('alert', 'Penugasan berhasil dibuat');
        } catch (\Exception $ex) {
            DB::rollback();

            foreach ($uploadQueue as $uploaded) {
                if (file_exists($uploaded)) {
                    unlink($uploaded);
                }
            }

            echo $ex;
            // return redirect()->back()->withInput()->with('alert', 'Terjadi kesalahan data!');
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
    public function update(Request $request, $slug)
    {
        $penugasan = PenugasanBeta::where('slug', $slug)->first();

        if ($penugasan) {
            $uploadPath = public_path() . '/uploads/';
            $uploadQueue = [];

            DB::beginTransaction();
            try {
                if (str_slug($request->judul) != str_slug($penugasan->judul)) {
                    $slug = substr(str_slug($request->judul), 0, 180);
                    $latestSlug = PenugasanBeta::where('slug', 'LIKE', $slug . '%')
                        ->orderBy('slug', 'DESC')->first('slug');

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
                $dom->loadHtml($request->deskripsi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
                $penugasan->waktu_mulai = $request->waktu_mulai;
                $penugasan->waktu_akhir = $request->waktu_akhir;
                $penugasan->batas_waktu = $request->batas_waktu ? $request->batas_waktu : null;
                $penugasan->deskripsi = $dom->savehtml();

                $penugasan->save();

                for ($i = 0; $i < count($request->soal); $i++) {
                    if (isset($request->soal[$i]['id'])) {
                        $soal = PenugasanSoalBeta::where('id', $request->soal[$i]['id'])->first();

                        if (!$soal) {
                            $soal = new PenugasanSoalBeta;
                        }
                    } else {
                        $soal = new PenugasanSoalBeta;
                    }

                    $dom = new \domdocument();
                    $dom->loadHtml($request->soal[$i]['soal'], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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

                    $soal->index = $i;
                    $soal->id_penugasan = $penugasan->id;
                    $soal->soal = $dom->savehtml();
                    $soal->save();

                    if ($penugasan->jenis == 2) {
                        // TODO : Masukkan jawaban
                        $submitted_pilihan_jawaban = [];
                        foreach ($request->soal[$i]['pilihan_jawaban'] as $pj) {
                            if (isset($pj['id'])) {
                                $pilihan_jawaban = PenugasanJawabanBeta::where('id', $id)->first();

                                if (!$pilihan_jawaban) {
                                    throw new Exception();
                                }
                            } else {
                                $pilihan_jawaban = new PenugasanJawabanBeta;
                            }

                            $dom = new \domdocument();
                            $dom->loadHtml($pj, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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

                            $pilihan_jawaban->save();
                            $submitted_pilihan_jawaban[] = $pilihan_jawaban;
                        }

                        $soal->id_jawaban_benar = $submitted_pilihan_jawaban[$request->soal[$i]['jawaban_benar']]->id;
                        $soal->save();
                    }
                }
                DB::commit();

                return redirect()->route('panel.penugasan.index')->with('alert', 'Penugasan berhasil diubah');
            } catch (\Exception $ex) {
                DB::rollback();

                foreach ($uploadQueue as $uploaded) {
                    if (file_exists($uploaded)) {
                        unlink($uploaded);
                    }
                }

                echo $ex;
                // return redirect()->back()->withInput()->with('alert', 'Terjadi kesalahan data!');
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

            return redirect()->route('panel.penugasan.index')->with('alert', 'Penugasan berhasil dihapus');
        } else {
            abort(404);
        }
    }
}
