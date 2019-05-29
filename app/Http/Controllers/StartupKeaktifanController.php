<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartupKeaktifanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $startupKeaktifans = StartupKeaktifan::all();
        return view('panel-admin.startup.stKeaktifan', ['startupKeaktifans' => $startupKeaktifans]);
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
    { }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $startupKeaktifan = StartupKeaktifan::where('nim', $mahasiswa->nim)->first();
        return view('panel-admin.startup.stEditKeaktifan', ['mahasiswa' => $mahasiswa, 'startupKeaktifan' => $startupKeaktifan]);
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
        $dataKeaktifan = StartupKeaktifan::where('nim', $nim)->update(
            [
                'aktif_rangkaian3' => $request->aktif_rangkaian3,
                'penerapan_nilai_rangkaian3' => $request->penerapan_nilai_rangkaian3,
                'aktif_rangkaian4' => $request->aktif_rangkaian4,
                'penerapan_nilai_rangkaian4' => $request->penerapan_nilai_rangkaian4,
                'aktif_rangkaian5' => $request->aktif_rangkaian5,
                'penerapan_nilai_rangkaian5' => $request->penerapan_nilai_rangkaian5
            ]
        );
        return redirect()->route('panel.kegiatan.startup.keaktifan.index')->with('alert', 'Berhasil mengubah data startup Keaktifan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $dataKeaktifan = StartupKeaktifan::where('nim', $nim)->first();
        $dataKeaktifan->delete();
        return redirect()->route('panel.kegiatan.startup.keaktifan.index')->with('alert', 'Berhasil menghapus data startup keaktifan');
    }
}
