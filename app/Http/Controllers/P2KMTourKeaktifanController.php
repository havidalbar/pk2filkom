<?php

namespace App\Http\Controllers;

use App\P2KMTourKeaktifan;
use Illuminate\Http\Request;

class P2KMTourKeaktifanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$p2kmTourKeaktifans = P2KMTourKeaktifan::all();
        return view('panel-admin.pkm.keaktifan-index', compact('p2kmTourKeaktifans'));
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
        $p2kmTourKeaktifan = P2KMTourKeaktifan::where('nim', $nim)->first();
        return view('panel-admin.pkm.keaktifan-edit', compact('p2kmTourKeaktifan'));
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
        $dataKeaktifan = P2KMTourKeaktifan::where('nim', $nim)->update([
            'aktif_rangkaian6' => $request->aktif_rangkaian6,
            'penerapan_nilai_rangkaian6' => $request->penerapan_nilai_rangkaian6,
            'aktif_rangkaian7' => $request->aktif_rangkaian7,
			'penerapan_nilai_rangkaian7' => $request->penerapan_nilai_rangkaian7,
			'aktif_rangkaian8' => $request->aktif_rangkaian8,
            'penerapan_nilai_rangkaian8' => $request->penerapan_nilai_rangkaian8,
        ]);
        return redirect()->route('panel.kegiatan.pkm.keaktifan.index')->with('alert', 'Berhasil mengubah data keaktifan P2KM Tour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $dataKeaktifan = P2KMTourKeaktifan::where('nim', $nim)->update([
            'aktif_rangkaian6' => 0,
            'penerapan_nilai_rangkaian6' => 0,
            'aktif_rangkaian7' => 0,
			'penerapan_nilai_rangkaian7' => 0,
			'aktif_rangkaian8' => 0,
            'penerapan_nilai_rangkaian8' => 0,
        ]);
        return redirect()->route('panel.kegiatan.pkm.keaktifan.index')->with('alert', 'Berhasil menghapus data keaktifan P2KM Tour');
    }
}
