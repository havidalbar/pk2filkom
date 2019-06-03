<?php

namespace App\Http\Controllers;

use App\PK2MabaAbsensi;
use Illuminate\Http\Request;

class PK2MabaAbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pk2mabaAbsensis = PK2MabaAbsensi::all();
        return view('panel-admin.pk2maba.absensi-index', compact('pk2mabaAbsensis'));
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
        $pk2mabaAbsensi = PK2MabaAbsensi::where('nim', $nim)->first();
        return view('panel-admin.pk2maba.absensi-edit', compact('pk2mabaAbsensi'));
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
        $dataAbsen = PK2MabaAbsensi::where('nim', $nim)->update([
            'nilai_rangkaian1' => $request->nilai_rangkaian1,
            'nilai_rangkaian2' => $request->nilai_rangkaian2,
        ]);
        return redirect()->route('panel.kegiatan.pk2maba.absensi.index')->with('alert', 'Berhasil mengubah data absensi PK2Maba');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $dataAbsen = PK2MabaAbsensi::where('nim', $nim)->update([
            'nilai_rangkaian1' => 0,
            'nilai_rangkaian2' => 0,
        ]);
        return redirect()->route('panel.kegiatan.pk2maba.absensi.index')->with('alert', 'Berhasil menghapus data absensi PK2Maba');
    }
}
