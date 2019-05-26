<?php

namespace App\Http\Controllers;

use App\Mahasiswa;

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
}
