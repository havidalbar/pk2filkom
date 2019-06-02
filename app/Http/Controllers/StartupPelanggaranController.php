<?php

namespace App\Http\Controllers;

use App\StartupPelanggaran;
use Illuminate\Http\Request;

class StartupPelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $startupPelanggarans = StartupPelanggaran::all();
        return view('panel-admin.startup.pelanggaran-index', ['startupPelanggarans' => $startupPelanggarans]);
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
        $startupPelanggaran = StartupPelanggaran::where('nim', $nim)->first();
        return view('panel-admin.startup.pelanggaran-edit', ['mahasiswa' => $mahasiswa, 'startupPelanggaran' => $startupPelanggaran]);
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
        $dataPelanggaran = StartupPelanggaran::where('nim', $nim)->update([
            'ringan' => $request->ringan,
            'sedang' => $request->sedang,
            'berat' => $request->berat,
        ]);
        return redirect()->route('panel.kegiatan.startup.pelanggaran.index')->with('alert', 'Berhasil mengubah data Startup Pelanggaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $dataPelanggaran = StartupPelanggaran::where('nim', $nim)->update([
            'ringan' => 0,
            'sedang' => 0,
            'berat' => 0,
        ]);
        return redirect()->route('panel.kegiatan.startup.pelanggaran.index')->with('alert', 'Berhasil menghapus data startup pelanggaran');
    }
}
