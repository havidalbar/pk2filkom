<?php

namespace App\Http\Controllers;

use App\Http\Requests\KomentarRequest;
use App\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class KomentarController extends Controller
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
     * @param  \App\Http\Requests\KomentarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KomentarRequest $request, $slug, $reply = null)
    {
        try {
            DB::beginTransaction();
            $artikel = \App\Artikel::without('sub')->where('slug', $slug)->first(['id']);
            $komentar = new Komentar;
            $komentar->id_artikel = $artikel->id;
            $komentar->isi = $request->isi;

            if ($reply) {
                $komentar->komentar_ke = $reply;
            }

            if (Session::get('nim')) {
                $komentar->nim_mahasiswa = Session::get('nim');
            } else if (Session::get('username')) {
                $komentar->username_admin = Session::get('username');
            }

            $komentar->save();
            DB::commit();

            return redirect()->back()->with('alert', 'Komentar berhasil dikirim');
        } catch (Exception $e) {
            DB::rollBack();
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
     * @param  \App\Http\Requests\KomentarRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KomentarRequest $request, $id)
    {
        $komentar = Komentar::where('id', $id)->first();
        if ($komentar) {
            $komentar->isi = $request->isi;
            $komentar->save();

            return redirect()->back()->with('alert', 'Komentar berhasil diubah');
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $komentar = Komentar::where('id', $id)->first();

        if ($komentar) {
            $komentar->delete();

            return redirect()->back()->with('alert', 'Komentar berhasil dihapus');
        } else {
            abort(404);
        }
    }
}
