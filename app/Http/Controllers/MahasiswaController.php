<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Faq;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    public function getFaq()
    {
        $faqs = Faq::all();
        return view('v_mahasiswa.faq', compact('faqs'));
    }

    public function getQRCodeAbsensiOpenHouse()
    {
        return view('v_mahasiswa/qrCode');
    }

    public function getBukuPanduan()
    {
        return view('v_mahasiswa/bukpan');
    }

    public function getCeritaTentangAku()
    {
        return view('v_mahasiswa/kumpulVideoIG');
    }
    
    public function getNametag()
    {
        $mahasiswa = Mahasiswa::find(Session::get('nim'));
        return view('v_mahasiswa/nametag');
    }
}
