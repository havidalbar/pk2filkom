<?php

namespace App\Http\Controllers;

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
        $startupAbsens = StartupAbsen::all();
        return view('panel-admin.startup.stabsensi', ['startupAbsens' => $startupAbsens]);
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
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $startupAbsen = StartupAbsen::where('nim', $mahasiswa->nim)->first();
        return view('panel-admin.startup.stEditAbsensi', ['mahasiswa' => $mahasiswa, 'startupAbsen' => $startupAbsen]);
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
        $dataAbsen = StartupAbsen::where('nim', $nim)->update(
            [
                'nilai_rangkaian3' => $request->nilai_rangkaian3,
                'nilai_rangkaian4' => $request->nilai_rangkaian4,
                'nilai_rangkaian5' => $request->nilai_rangkaian5
            ]
        );
        return redirect()->route('panel.kegiatan.startup.absensi.index')->with('alert', 'Berhasil mengubah data startup Absensi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $dataAbsen = StartupAbsen::where('nim', $nim)->first();
        $dataAbsen->delete();
        return redirect()->route('panel.kegiatan.startup.absensi.index')->with('alert', 'Berhasil menghapus data startup absensi');
    }
}
