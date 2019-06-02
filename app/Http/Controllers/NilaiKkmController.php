<?php

namespace App\Http\Controllers;

use App\NilaiKKM;
use App\Http\Requests\NilaiKkmRequest;
use Illuminate\Http\Request;

class NilaiKkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilaikkms = NilaiKKM::all();
        return view('panel-admin.nilai-kkm.index', ['nilaikkms' => $nilaikkms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel-admin.nilai-kkm.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\NilaiKkmRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NilaiKkmRequest $request)
    {
        $data = new NilaiKKM();
        $data->kegiatan = $request->kegiatan;
        $data->nilai = $request->nilai;
        $data->save();
        return redirect()->route('panel.nilai-kkm.index')->with('alert', 'Berhasil menambah penilaian');
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
        $dataNilai = NilaiKKM::find($id);
        return view('panel-admin.nilai-kkm.edit', ['dataNilai' => $dataNilai]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\NilaiKkmRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NilaiKkmRequest $request, $id)
    {
        $dataNilai = NilaiKKM::where('id', $id)->update([
            'kegiatan' => $request->kegiatan,
            'nilai' => $request->nilai,
        ]);
        return redirect()->route('panel.nilai-kkm.index')->with('alert', 'Berhasil mengubah data nilai kkm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataNilai = NilaiKKM::where('id', $id)->first();
        $dataNilai->delete();
        return redirect()->route('panel.nilai-kkm.index')->with('alert', 'Berhasil menghapus penilaian');
    }
}
