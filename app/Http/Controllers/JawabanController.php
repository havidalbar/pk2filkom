<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PenugasanBeta;

class JawabanController extends Controller
{
    public function getViewJawaban(Request $request, $slug)
    {
        $penugasan = PenugasanBeta::where('slug', $slug)->first();

        if ($penugasan) {
            switch ($penugasan->jenis) {
                case '1':
                case '2':
                    return $this->getViewFormInstagramYoutube($request, $penugasan);
                case '3':
                    return $this->getViewFormLine($penugasan);
                case '4':
            }
        } else {
            abort(404);
        }
    }

    private function getViewFormInstagramYoutube(Request $request, $penugasan)
    {
        return view('v_mahasiswa/kumpulVideoIG');
    }

    private function getViewFormLine($penugasan)
    {
        return view('v_mahasiswa/kumpulVideoIG');
    }
}
