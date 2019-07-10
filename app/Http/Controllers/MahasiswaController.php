<?php

namespace App\Http\Controllers;

class MahasiswaController extends Controller
{
    //
    public function getQRCodeAbsensiOpenHouse()
    {
        return view('v_mahasiswa/qrCode');
    }
}
