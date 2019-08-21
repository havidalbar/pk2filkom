<?php

namespace App\Http\Controllers;

use App\KelompokPKM;
use App\PenugasanBeta;
use Illuminate\Http\Request;

class PenugasanKelompokPKMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penugasans = PenugasanBeta::whereIn('jenis', [8, 9])->withCount(['soal'])->get();
        return view('panel-admin.tugas-kelompok.index', compact('penugasans'));
    }

    public function viewJawaban($slug)
    {
        $penugasan = PenugasanBeta::where('slug', $slug)->with('soal')
            ->whereIn('jenis', [8, 9])
            ->withCount(['soal'])->first();

        if ($penugasan) {
            $kelompoks = KelompokPKM::all();
            switch ($penugasan->jenis) {
                case 8:
                case 9:
                    return view('panel-admin.tugas-kelompok.jawaban.multitext', compact('penugasan', 'kelompoks'));
                default:
                    abort(400);
            }
        } else {
            abort(404);
        }
    }
}
