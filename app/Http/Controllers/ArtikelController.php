<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Http\Requests\ArtikelRequest;
use App\SubArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikels = Artikel::all();
        return view('panel-admin.artikel.index', compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel-admin.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ArtikelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtikelRequest $request)
    {
        DB::beginTransaction();
        try {
            $artikel = new Artikel;

            $slug = substr(str_slug($request->judul), 0, 180);
            $latestSlug = Artikel::where('slug', 'LIKE', $slug . '%')
                ->orderBy('slug', 'DESC')->first('slug');

            if ($latestSlug) {
                $slug_element = explode('-', $latestSlug->slug);
                $latestSlugNumber = end($slug_element);

                if (is_numeric($latestSlugNumber)) {
                    $artikel->slug = $slug . '-' . ($latestSlugNumber + 1);
                } else {
                    $artikel->slug = $slug . '-1';
                }
            } else {
                $artikel->slug = $slug;
            }

            $artikel->judul = $request->judul;

            $uploadPath = public_path() . '/uploads/';

            // $dom = new \domdocument();
            // $dom->loadHtml($request->deskripsi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            // $images = $dom->getelementsbytagname('img');

            // //loop over img elements, decode their base64 src and save them to public folder,
            // //and then replace base64 src with stored image URL.
            // foreach ($images as $k => $img) {
            //     $data = $img->getattribute('src');

            //     list($type, $data) = explode(';', $data);
            //     list(, $data) = explode(',', $data);

            //     $data = base64_decode($data);
            //     // $image_name = time() . $k . '.png';
            //     $image_extension = str_replace('data:image/', '', $type);
            //     $image_name = str_replace('.', '-', uniqid()) . '.' . $image_extension;

            //     file_put_contents($uploadPath . $image_name, $data);

            //     $img->removeattribute('src');
            //     $img->setattribute('src', asset('/uploads/' . $image_name));
            // }

            // $artikel->deskripsi = $dom->savehtml();

            //thumbnail
            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $thumbnailFileName = uniqid() . '.' . $thumbnail->getClientOriginalExtension();
                $thumbnail->move($uploadPath . 'thumbnail/', $thumbnailFileName);
                $artikel->thumbnail = $thumbnailFileName;
            }

            $artikel->save();

            for ($i = 0; $i < count($request->sub_konten); $i++) {
                $sub_konten = new SubArtikel;

                if ($request->gambar_sub[$i]) {
                    $gambar_sub = $request->gambar_sub[$i];
                    $gambar_sub_name = uniqid() . '.' . $gambar_sub->getClientOriginalExtension();
                    $gambar_sub->move($uploadPath . 'sub_artikel/', $gambar_sub_name);
                    $sub_konten->thumbnail = $gambar_sub_name;
                }

                $dom = new \domdocument();
                $dom->loadHtml($request->sub_konten[$i], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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

                    file_put_contents($uploadPath . 'sub_artikel/' . $image_name, $data);

                    $img->removeattribute('src');
                    $img->setattribute('src', asset('/uploads/sub_artikel/' . $image_name));
                }

                $sub_konten->id_artikel = $artikel->id;
                $sub_konten->deskripsi = $dom->savehtml();
                $sub_konten->save();
            }
            DB::commit();

            return redirect()->route('panel.artikel.index')->with('alert', 'Artikel berhasil dibuat');
        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->back()->withInput()->with('alert', 'Terjadi kesalahan data!');
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
        $artikel = Artikel::where('slug', $slug)->first();

        if ($artikel) {
            // TODO : RETURN TAMPILAN BERITA [Fadhil]
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();

        if ($artikel) {
            return view('panel-admin.artikel.edit', compact('slug', 'artikel'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ArtikelRequest  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(ArtikelRequest $request, $slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();

        if ($artikel) {
            DB::beginTransaction();
            try {
                if (str_slug($request->judul) != str_slug($artikel->judul)) {
                    $slug = substr(str_slug($request->judul), 0, 180);
                    $latestSlug = Artikel::where('slug', 'LIKE', $slug . '%')
                        ->orderBy('slug', 'DESC')->first('slug');

                    if ($latestSlug) {
                        $slug_element = explode('-', $latestSlug->slug);
                        $latestSlugNumber = end($slug_element);

                        if (is_numeric($latestSlugNumber)) {
                            $artikel->slug = $slug . '-' . ($latestSlugNumber + 1);
                        } else {
                            $artikel->slug = $slug . '-1';
                        }
                    } else {
                        $artikel->slug = $slug;
                    }
                }

                $artikel->judul = $request->judul;

                $uploadPath = public_path() . '/uploads/';

                // $dom = new \domdocument();
                // $dom->loadHtml($request->deskripsi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                // $images = $dom->getelementsbytagname('img');

                // //loop over img elements, decode their base64 src and save them to public folder,
                // //and then replace base64 src with stored image URL.
                // foreach ($images as $k => $img) {
                //     $data = $img->getattribute('src');

                //     list($type, $data) = explode(';', $data);
                //     list(, $data) = explode(',', $data);

                //     $data = base64_decode($data);
                //     // $image_name = time() . $k . '.png';
                //     $image_extension = str_replace('data:image/', '', $type);
                //     $image_name = str_replace('.', '-', uniqid()) . '.' . $image_extension;

                //     file_put_contents($uploadPath . $image_name, $data);

                //     $img->removeattribute('src');
                //     $img->setattribute('src', asset('/uploads/' . $image_name));
                // }

                // $artikel->deskripsi = $dom->savehtml();

                //thumbnail
                if ($request->hasFile('thumbnail')) {
                    $thumbnail = $request->file('thumbnail');
                    $thumbnailFileName = uniqid() . '.' . $thumbnail->getClientOriginalExtension();
                    $thumbnail->move($uploadPath . 'thumbnail/', $thumbnailFileName);

                    if ($artikel->thumbnail) {
                        if (file_exists($uploadPath . 'thumbnail/' . $artikel->thumbnail)) {
                            unlink($uploadPath . 'thumbnail/' . $artikel->thumbnail);
                        }
                    }

                    $artikel->thumbnail = $thumbnailFileName;
                }

                $artikel->save();

                // TODO : Update Artikel
                $sub_kontens = SubArtikel::where('id_artikel', $artikel->id)->get();

                for ($i = 0; $i < count($request->sub_konten); $i++) {
                    if (count($sub_kontens) <= count($request->sub_konten) && $i <= count($sub_kontens) - 1) {
                        if ($request->gambar_sub[$i]) {
                            $gambar_sub = $request->gambar_sub[$i];
                            $gambar_sub_name = uniqid() . '.' . $gambar_sub->getClientOriginalExtension();
                            $gambar_sub->move($uploadPath . 'sub_artikel/', $gambar_sub_name);
                            $sub_kontens[$i]->thumbnail = $gambar_sub_name;
                        }

                        $dom = new \domdocument();
                        $dom->loadHtml($request->sub_konten[$i], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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

                            file_put_contents($uploadPath . 'sub_artikel/' . $image_name, $data);

                            $img->removeattribute('src');
                            $img->setattribute('src', asset('/uploads/sub_artikel/' . $image_name));
                        }
                        $sub_kontens[$i]->id_artikel = $artikel->id;
                        $sub_kontens[$i]->deskripsi = $dom->savehtml();
                        $sub_kontens[$i]->save();
                    } else {

                        $sub_konten = new SubArtikel;

                        if ($request->gambar_sub[$i]) {
                            $gambar_sub = $request->gambar_sub[$i];
                            $gambar_sub_name = uniqid() . '.' . $gambar_sub->getClientOriginalExtension();
                            $gambar_sub->move($uploadPath . 'sub_artikel/', $gambar_sub_name);
                            $sub_konten->thumbnail = $gambar_sub_name;
                        }

                        $dom = new \domdocument();
                        $dom->loadHtml($request->sub_konten[$i], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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

                            file_put_contents($uploadPath . 'sub_artikel/' . $image_name, $data);

                            $img->removeattribute('src');
                            $img->setattribute('src', asset('/uploads/sub_artikel/' . $image_name));
                        }

                        $sub_konten->id_artikel = $artikel->id;
                        $sub_konten->deskripsi = $dom->savehtml();
                        $sub_konten->save();

                    }
                }

                DB::commit();

                return redirect()->route('panel.artikel.index')->with('alert', 'Artikel berhasil diubah');
            } catch (\Exception $ex) {
                DB::rollBack();
                return redirect()->back()->withInput()->with('alert', 'Terjadi kesalahan data!');
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
        $artikel = Artikel::where('slug', $slug)->first();

        if ($artikel) {
            $uploadPath = public_path() . '/uploads/';

            $sub_kontens = SubArtikel::where('id_artikel', $artikel->id)->get();

            $artikel->delete();

            if (file_exists($uploadPath . 'thumbnail/' . $artikel->thumbnail)) {
                unlink($uploadPath . 'thumbnail/' . $artikel->thumbnail);
            }

            foreach ($sub_kontens as $sub_konten) {
                if (file_exists($uploadPath . 'sub_artikel/' . $sub_konten->thumbnail)) {
                    unlink($uploadPath . 'sub_artikel/' . $sub_konten->thumbnail);
                }
                $sub_konten->delete();
            }

            return redirect()->route('panel.artikel.index')->with('alert', 'Artikel berhasil dihapus');
        } else {
            abort(404);
        }
    }
}
