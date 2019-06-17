<?php

namespace App\Http\Controllers;

use App\P2KMTourPelanggaran;
use Illuminate\Http\Request;

class P2KMTourPelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p2kmTourPelanggarans = P2KMTourPelanggaran::all();
        return view('panel-admin.pkm.pelanggaran-index', compact('p2kmTourPelanggarans'));
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
        //
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
        $p2kmTourPelanggaran = P2KMTourPelanggaran::where('nim', $nim)->first();
        return view('panel-admin.pkm.pelanggaran-edit', compact('p2kmTourPelanggaran'));
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
        $dataPelanggaran = P2KMTourPelanggaran::where('nim', $nim)->update([
            'ringan' => $request->ringan,
            'sedang' => $request->sedang,
            'berat' => $request->berat,
        ]);
        return redirect()->route('panel.kegiatan.pkm.pelanggaran.index')->with('alert', 'Berhasil mengubah data keaktifan P2KM Tour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $dataPelanggaran = P2KMTourPelanggaran::where('nim', $nim)->update([
            'ringan' => 0,
            'sedang' => 0,
            'berat' => 0,
        ]);
        return redirect()->route('panel.kegiatan.pkm.pelanggaran.index')->with('alert', 'Berhasil menghapus data keaktifan P2KM Tour');
    }
}
