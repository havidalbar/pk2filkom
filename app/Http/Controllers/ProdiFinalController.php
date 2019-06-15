<?php

namespace App\Http\Controllers;

use App\ProdiFinal;
use Illuminate\Http\Request;

class ProdiFinalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodiFinals = ProdiFinal::all();
        return view('panel-admin.prodi-final.index', ['prodiFinals' => $prodiFinals]);
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
        $prodiFinal = ProdiFinal::where('nim', $nim)->first();
        return view('panel-admin.prodi-final.edit', compact('prodiFinal'));
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
        $prodiFinal = ProdiFinal::where('nim', $nim)->update([
            'nilai_full' => $request->nilai_prodi,
        ]);
        return redirect()->route('panel.kegiatan.prodi.index')->with('alert', 'Berhasil mengubah data nilai Prodi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $prodiFinal = ProdiFinal::where('nim', $nim)->update([
            'nilai_full' => 0,
        ]);
        return redirect()->route('panel.kegiatan.prodi.index')->with('alert', 'Berhasil mengubah data nilai Prodi');
    }
}
