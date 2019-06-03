<?php

namespace App\Http\Controllers;

use App\PK2MabaPelanggaran;
use Illuminate\Http\Request;

class PK2MabaPelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pk2mabaPelanggarans = PK2MabaPelanggaran::all();
        return view('panel-admin.pk2maba.pelanggaran-index', compact('pk2mabaPelanggarans'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        $pk2mabaPelanggaran = PK2MabaPelanggaran::where('nim', $nim)->first();
        return view('panel-admin.pk2maba.pelanggaran-edit', compact('pk2mabaPelanggaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        $dataPelanggaran = PK2MabaPelanggaran::where('nim', $nim)->update([
            'ringan' => $request->ringan,
            'sedang' => $request->sedang,
            'berat' => $request->berat,
        ]);
        return redirect()->route('panel.kegiatan.pk2maba.pelanggaran.index')->with('alert', 'Berhasil mengubah data keaktifan PK2Maba');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $dataPelanggaran = PK2MabaPelanggaran::where('nim', $nim)->update([
            'ringan' => 0,
            'sedang' => 0,
            'berat' => 0,
        ]);
        return redirect()->route('panel.kegiatan.pk2maba.pelanggaran.index')->with('alert', 'Berhasil menghapus data keaktifan PK2Maba');
    }
}
