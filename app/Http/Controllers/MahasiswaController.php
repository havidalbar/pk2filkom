<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Faq;

class MahasiswaController extends Controller
{
    public function getFaq(){
        $faqs = Faq::all();
        return view('v_mahasiswa.faq', compact('faqs'));
    }
}
