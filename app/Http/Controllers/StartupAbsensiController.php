<?php

namespace App\Http\Controllers;

use App\StartupAbsensi;
use Illuminate\Http\Request;

class StartupAbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $startupAbsensis = StartupAbsensi::all();
        return view('panel-admin.startup.absensi-index', compact('startupAbsensis'));
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
        $startupAbsensi = StartupAbsensi::where('nim', $nim)->first();
        return view('panel-admin.startup.absensi-edit', compact('startupAbsensi'));
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
        $dataAbsen = StartupAbsensi::where('nim', $nim)->update([
            'nilai_rangkaian3' => $request->nilai_rangkaian3,
            'nilai_rangkaian4' => $request->nilai_rangkaian4,
            'nilai_rangkaian5' => $request->nilai_rangkaian5,
        ]);
        return redirect()->route('panel.kegiatan.startup.absensi.index')->with('alert', 'Berhasil mengubah data absensi Startup Academy');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $dataAbsen = StartupAbsensi::where('nim', $nim)->update([
            'nilai_rangkaian3' => 0,
            'nilai_rangkaian4' => 0,
            'nilai_rangkaian5' => 0,
        ]);
        return redirect()->route('panel.kegiatan.startup.absensi.index')->with('alert', 'Berhasil menghapus data absensi Startup Academy');
    }
}
