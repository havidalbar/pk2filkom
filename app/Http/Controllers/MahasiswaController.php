<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function getBiodata()
    {
        $mahasiswas = Mahasiswa::all();
        return view('panel-admin.mahasiswa.biodata', compact('mahasiswas'));
    }

    public function getKesehatan()
    {
        $mahasiswas = Mahasiswa::all();
        return view('panel-admin.mahasiswa.biodata', compact('mahasiswas'));
    }

    public function editBiodataByAdmin($nim)
    {
        $dataMahasiswa = Mahasiswa::where('nim', $nim)->first();
        return view('panel-admin.mahasiswa.edit-biodata', ['dataMahasiswa' => $dataMahasiswa]);
    }

    public function updateBiodataByAdmin(Request $request, $nim)
    {
        $dataMahasiswa = Mahasiswa::where('nim', $nim)->update(['kelompok' => $request->kelompok, 'cluster' => $request->cluster]);
        return redirect()->route('panel.mahasiswa.biodata')->with('alert', 'Berhasil mengubah data mahasiswa');
    }
}
