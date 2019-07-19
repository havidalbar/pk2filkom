<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Faq;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $berita_terakhir = \App\Artikel::orderBy('created_at', 'DESC')->first();
        $beritas = \App\Artikel::orderBy('created_at', 'DESC')->without('sub')->get(['judul', 'thumbnail', 'slug']);
        return view('v_mahasiswa/halamanAwal', compact('berita_terakhir', 'beritas'));
    }

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

    public function getPenilaian(){
        $mahasiswa = Mahasiswa::find(Session::get('nim'));
        return view('v_mahasiswa/halamanPenilaian',compact('mahasiswa'));
    }

    public function getTemanSimaba(){
        return view('v_mahasiswa/temanSimaba');
    }
    public function getTemanSimabaAkademik(){
        return view('v_mahasiswa/temanSimabaAkademik');
    }
    public function getTemanSimabaKampus(){
        return view('v_mahasiswa/temanSimabaKampus');
    }
    public function getTemanSimabaFilkom(){
        return view('v_mahasiswa/temanSimabaFilkom');
    }

    public function getProtectedFile($name)
    {
        $file = \App\ProtectedFile::find($name);

        if ($file) {
            if (session('nim') == $file->jawaban->nim || session('username')) {
                if (file_exists(storage_path($file->path))) {
                    return response()->file(storage_path($file->path));
                } else {
                    abort(404);
                }
            } else {
                abort(401);
            }
        } else {
            abort(404);
        }
    }
}
