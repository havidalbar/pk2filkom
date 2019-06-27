<?php

namespace App\Http\Controllers;

use App\PenugasanBeta;
use App\PenugasanSoalBeta;
use Illuminate\Http\Request;

class PenugasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $uploadPath = public_path() . '/uploads/';
        $uploadQueue = [];

        DB::beginTransaction();
        try {
            $penugasan = new PenugasanBeta;

            $slug = substr(str_slug($request->judul), 0, 180);
            $latestSlug = PenugasanBeta::where('slug', 'LIKE', $slug . '%')
                ->orderBy('slug', 'DESC')->first('slug');

            if ($latestSlug) {
                $latestSlugNumber = str_replace($slug . '-', '', $latestSlug->slug);

                if ($latestSlugNumber) {
                    error_log($latestSlugNumber);
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

            $penugasan->random = $request->random;
            $penugasan->editable = $request->editable;
            $penugasan->jenis = $request->jenis;
            $penugasan->waktu_mulai = $request->waktu_mulai;
            $penugasan->waktu_akhir = $request->waktu_akhir;

            $penugasan->deskripsi = $dom->savehtml();

            $penugasan->save();

            for ($i = 0; $i < count($request->soal); $i++) {
                $soal = new PenugasanSoalBeta;

                $dom = new \domdocument();
                $dom->loadHtml($request->soal[$i], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                $images = $dom->getelementsbytagname('img');

                //loop over img elements, decode their base64 src and save them to public folder,
                //and then replace base64 src with stored image URL.
                foreach ($images as $k => $img) {
                    $data = $img->getattribute('src');

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

                $soal->id_penugasan = $penugasan->id;
                $soal->soal = $dom->savehtml();
                $soal->save();

                if ($penugasan->jenis == 2) {
                    // TODO : Masukkan jawaban
                }
            }
            DB::commit();

            return redirect()->route('panel.artikel.index')->with('alert', 'Artikel berhasil dibuat');
        } catch (\Exception $ex) {
            DB::rollback();

            foreach ($uploadQueue as $uploaded) {
                if (file_exists($uploaded)) {
                    unlink($uploaded);
                }
            }

            return redirect()->back()->withInput()->with('alert', 'Terjadi kesalahan data!');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
