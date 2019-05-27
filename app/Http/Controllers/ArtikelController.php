<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artikel = new Artikel;

        $slug = substr(str_slug($request->judul), 0, 180);
        $latestSlug = Artikel::where('slug', 'LIKE', $slug . '%')
            ->orderBy('slug', 'DESC')->first('slug');

        if ($latestSlug) {
            $latestSlugNumber = str_replace($slug . '-', '', $latestSlug->slug);

            if ($latestSlugNumber) {
                error_log($latestSlugNumber);
                $artikel->slug = $slug . '-' . ($latestSlugNumber + 1);
            } else {
                $artikel->slug = $slug . '-1';
            }
        } else {
            $artikel->slug = $slug;
        }

        $artikel->judul = $request->judul;

        $uploadPath = public_path() . '/uploads/';

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
            $image_name = str_replace('.', '-', uniqid()) . '.' . $image_extension;

            file_put_contents($uploadPath . $image_name, $data);

            $img->removeattribute('src');
            $img->setattribute('src', asset('/uploads/' . $image_name));
        }

        $artikel->deskripsi = $dom->savehtml();

        //thumbnail
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailFileName = uniqid('thumbnail-') . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($uploadPath, $thumbnailFileName);
            $artikel->thumbnail = $thumbnailFileName;
        }

        $artikel->save();
        return redirect()->route('panel.artikel.index')->with('alert', 'Artikel berhasil dibuat');
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
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();

        if ($artikel) {
            $slug = substr(str_slug($request->judul), 0, 180);
            if ($slug != $artikel->slug) {
                $latestSlug = Artikel::where('slug', 'LIKE', $slug . '%')
                    ->orderBy('slug', 'DESC')->first('slug');

                if ($latestSlug) {
                    $latestSlugNumber = str_replace($slug . '-', '', $latestSlug->slug);

                    if ($latestSlugNumber) {
                        error_log($latestSlugNumber);
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
                $image_name = str_replace('.', '-', uniqid()) . '.' . $image_extension;

                file_put_contents($uploadPath . $image_name, $data);

                $img->removeattribute('src');
                $img->setattribute('src', asset('/uploads/' . $image_name));
            }

            $artikel->deskripsi = $dom->savehtml();

            //thumbnail
            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $thumbnailFileName = uniqid('thumbnail-') . '.' . $thumbnail->getClientOriginalExtension();
                $thumbnail->move($uploadPath, $thumbnailFileName);

                if ($artikel->thumbnail) {
                    if (file_exists($uploadPath . $artikel->thumbnail)) {
                        unlink($uploadPath . $artikel->thumbnail);
                    }
                }

                $artikel->thumbnail = $thumbnailFileName;
            }

			$artikel->save();
			return redirect()->route('panel.artikel.index')->with('alert', 'Artikel berhasil diubah');
        } else {
            return abort(404);
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
            $artikel->delete();

            return redirect()->route('panel.artikel.index')->with('alert', 'Artikel berhasil dihapus');
        } else {
            abort(404);
        }
    }
}
