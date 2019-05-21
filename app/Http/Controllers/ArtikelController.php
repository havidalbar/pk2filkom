<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Kategori;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    //
    public function postArtikel(Request $request)
    {
        // slug
        $slug = $request->slug;

        if ($slug) {
            $artikel = Artikel::find($slug);
        } else {
            $artikel = new Artikel;
        }

        $trimmedSlug = substr(str_slug(trim($request->judul)), 0, 180);
        $existSlugs = Artikel::where('slug', 'LIKE', $trimmedSlug . '%')->count();

        if ($existSlugs) {
            $artikel->slug = $trimmedSlug . '-' . $existSlugs;
        } else {
            $artikel->slug = $trimmedSlug;
        }

        $artikel->slug_kategori = $request->slug_kategori;
        $artikel->judul = $request->judul;

        if ($artikel) {
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
                $path = public_path() . "/uploads/" . $image_name;

                file_put_contents($path, $data);

                $img->removeattribute('src');
                $img->setattribute('src', $image_name);
            }

            $artikel->deskripsi = $dom->savehtml();

            //thumbnail
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = public_path() . '/uploads/';
                $thumbnail = $request->file('thumbnail');
                $thumbnailFileName = uniqid('thumbnail-') . '.' . $thumbnail->getClientOriginalExtension();
                $thumbnail->move($thumbnailPath, $thumbnailFileName);
                $artikel->thumbnail = $thumbnailFileName;
            }

            // if ($id) {
            //     $post->penyunting = 'admin';
            //     $post->ip_penyunting = $request->ip();
            // } else {
            //     $post->pembuat = 'admin';
            //     $post->ip_pembuat = $request->ip();
            // }

            $artikel->save();
            return redirect('/')->with('alert', 'Pos berhasil dibuat');
        } else {
            return abort(404);
        }
    }

    public function showArtikel(Request $request, $slug)
    {
        $artikel = Artikel::find($slug);
        if ($artikel) {
            return view('show-post', compact('artikel'));
        } else {
            return abort(404);
        }
    }

    public function createArtikel(Request $request, $slug = null)
    {
        $artikel = Artikel::find($slug);
        $kategori = Kategori::all();
        if (!$artikel && $slug) {
            return abort(404);
        } else {
            return view('new-post', compact('artikel', 'kategori'));
        }
    }

    public function addKategori(Request $request)
    {
        $slug = str_slug(trim($request->jenis));

        $exist = Kategori::find($slug);

        if ($exist) {
            return redirect()->back()->with('alert', 'Kategori sudah terdaftar')->withInput();
        } else {
            $kategori = new Kategori;
            $kategori->slug = $slug;
            $kategori->jenis = $request->jenis;
            $kategori->save();

            return redirect()->back()->with('alert', 'Kategori berhasil didaftarkan');
        }
    }

    public function deleteKategori(Request $request)
    {
        $kategori = Kategori::find($slug);

        if ($kategori) {
            $kategori->delete();
            return redirect()->back()->with('alert', 'Kategori berhasil dihapus');
        } else {
            abort(404);
        }
    }
}
