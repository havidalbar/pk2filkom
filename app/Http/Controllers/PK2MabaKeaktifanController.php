<?php

namespace App\Http\Controllers;

use App\PK2MabaKeaktifan;
use Illuminate\Http\Request;

class PK2MabaKeaktifanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$pk2mabaKeaktifans = PK2MabaKeaktifan::all();
        return view('panel-admin.pk2maba.keaktifan-index', ['pk2mabaKeaktifans' => $pk2mabaKeaktifans]);
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
        $pk2mabaKeaktifan = PK2MabaKeaktifan::where('nim', $nim)->first();
        return view('panel-admin.pk2maba.keaktifan-edit', compact('pk2mabaKeaktifan'));
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
        $dataKeaktifan = PK2MabaKeaktifan::where('nim', $nim)->update([
            'aktif_rangkaian1' => $request->aktif_rangkaian1,
            'penerapan_nilai_rangkaian1' => $request->penerapan_nilai_rangkaian1,
            'aktif_rangkaian2' => $request->aktif_rangkaian2,
            'penerapan_nilai_rangkaian2' => $request->penerapan_nilai_rangkaian2,
        ]);
        return redirect()->route('panel.kegiatan.pk2maba.keaktifan.index')->with('alert', 'Berhasil mengubah data keaktifan PK2Maba');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $dataKeaktifan = PK2MabaKeaktifan::where('nim', $nim)->update([
            'aktif_rangkaian1' => 0,
            'penerapan_nilai_rangkaian1' => 0,
            'aktif_rangkaian2' => 0,
            'penerapan_nilai_rangkaian2' => 0,
        ]);
        return redirect()->route('panel.kegiatan.pk2maba.keaktifan.index')->with('alert', 'Berhasil menghapus data keaktifan PK2Maba');
    }
}
