<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    //
    public function index()
    {
        $kategori = Kategori::all();

        return view('panel-admin.dataKategori', compact('kategori'));
    }

    public function create()
    {
        return view('panel-admin.tambahKategori');
    }

    public function store(Request $request)
    {
        $slug = str_slug(trim($request->jenis));

        $exist = Kategori::find($slug);

        if ($exist) {
            return redirect()->back()->with('alert-error', 'Kategori sudah terdaftar')->withInput();
        } else {
            $kategori = new Kategori;
            $kategori->slug = $slug;
            $kategori->jenis = $request->jenis;
            $kategori->save();

            return redirect()->back()->with('alert-success', 'Kategori berhasil didaftarkan');
        }
    }

    public function show(Request $request, $slug)
    {
        $kategori = Kategori::with('artikel')->find($slug);

        return response()->json($kategori);
    }

    public function edit()
    {
        return view('panel-admin.editKategori');
    }

    public function update(Request $request, $slug)
    {
        $exist = Kategori::find($slug);

        if ($exist) {
            $newSlug = str_slug($request->jenis);

            if ($newSlug == $slug) {
				$exist->jenis = $request->jenis;
                $kategori->save();				
            } else {
                $kategori = new Kategori;
                $kategori->slug = $newSlug;
                $kategori->jenis = $request->jenis;
                $kategori->save();
            }

            return redirect()->route('panel.publikasi.kategori.index')->with('alert-success', 'Kategori berhasil diubah');
        } else {
            abort(404);
        }
    }

    public function destroy()
    {
		// TODO : [Fadhil]
    }
}
