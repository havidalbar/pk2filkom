<?php

namespace App\Http\Controllers;

use App\P2KMTourAbsensi;
use Illuminate\Http\Request;

class P2KMTourAbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p2kmTourAbsensis = P2KMTourAbsensi::all();
        return view('panel-admin.pkm.absensi-index', compact('p2kmTourAbsensis'));
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
        $p2kmTourAbsensi = P2KMTourAbsensi::where('nim', $nim)->first();
        return view('panel-admin.pkm.absensi-edit', compact('p2kmTourAbsensi'));
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
        $dataAbsen = P2KMTourAbsensi::where('nim', $nim)->update([
            'nilai_rangkaian6' => $request->nilai_rangkaian6,
            'nilai_rangkaian7' => $request->nilai_rangkaian7,
            'nilai_rangkaian8' => $request->nilai_rangkaian8,
        ]);
        return redirect()->route('panel.kegiatan.pkm.absensi.index')->with('alert', 'Berhasil mengubah data absensi P2KM Tour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $dataAbsen = P2KMTourAbsensi::where('nim', $nim)->update([
            'nilai_rangkaian6' => 0,
            'nilai_rangkaian7' => 0,
            'nilai_rangkaian8' => 0,
        ]);
        return redirect()->route('panel.kegiatan.pkm.absensi.index')->with('alert', 'Berhasil menghapus data absensi P2KM Tour');
    }
}
