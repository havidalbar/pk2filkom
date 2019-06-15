<?php

namespace App\Http\Controllers;

use App\StartupKeaktifan;
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
        return view('panel-admin.startup.keaktifan-index', ['startupKeaktifans' => $startupKeaktifans]);
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
        $startupKeaktifan = StartupKeaktifan::where('nim', $nim)->first();
        return view('panel-admin.startup.keaktifan-edit', compact('startupKeaktifan'));
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
        $dataKeaktifan = StartupKeaktifan::where('nim', $nim)->update([
            'aktif_rangkaian3' => $request->aktif_rangkaian3,
            'penerapan_nilai_rangkaian3' => $request->penerapan_nilai_rangkaian3,
            'aktif_rangkaian4' => $request->aktif_rangkaian4,
            'penerapan_nilai_rangkaian4' => $request->penerapan_nilai_rangkaian4,
            'aktif_rangkaian5' => $request->aktif_rangkaian5,
            'penerapan_nilai_rangkaian5' => $request->penerapan_nilai_rangkaian5,
        ]);
        return redirect()->route('panel.kegiatan.startup.keaktifan.index')->with('alert', 'Berhasil mengubah data keaktifan Startup Academy');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $dataKeaktifan = StartupKeaktifan::where('nim', $nim)->update([
            'aktif_rangkaian3' => 0,
            'penerapan_nilai_rangkaian3' => 0,
            'aktif_rangkaian4' => 0,
            'penerapan_nilai_rangkaian4' => 0,
            'aktif_rangkaian5' => 0,
            'penerapan_nilai_rangkaian5' => 0,
        ]);
        return redirect()->route('panel.kegiatan.startup.keaktifan.index')->with('alert', 'Berhasil menghapus data keaktifan Startup Academy');
    }
}
