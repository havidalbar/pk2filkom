<?php

namespace App\Http\Controllers;

use App\JawabanBeta;
use App\PenugasanBeta;
use App\ProtectedFile;
use App\Http\Requests\SubmitIGYTRequest;
use App\Http\Requests\SubmitLineRequest;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    public function index()
    {
        return view('v_mahasiswa/penugasan');
    }

    public function getViewJawaban(Request $request, $slug)
    {
        $penugasan = PenugasanBeta::where('slug', $slug)->first();

        if ($penugasan) {
            switch ($penugasan->jenis) {
                case '1':
                case '2':
                    return $this->getViewFormInstagramYoutube($request, $penugasan);
                case '3':
                    return $this->getViewFormLine($request, $penugasan);
                case '4':
            }
        } else {
            abort(404);
        }
    }

    private function getViewFormInstagramYoutube(Request $request, $penugasan)
    {
        $jawabans = JawabanBeta::where([
            'nim' => session('nim'),
            'id_penugasan' => $penugasan->id
        ])->get();
        return view('v_mahasiswa/kumpulVideoIG', compact('penugasan', 'jawabans'));
    }

    private function getViewFormLine(Request $request, $penugasan)
    {
        $jawabans = JawabanBeta::where([
            'nim' => session('nim'),
            'id_penugasan' => $penugasan->id
        ])->get();
        return view('v_mahasiswa/kumpulLine');
    }

    public function submitJawaban($request, $slug)
    {
        $penugasan = PenugasanBeta::where('slug', $slug)->first();

        if ($penugasan) {
            switch ($penugasan->jenis) {
                case '1':
                case '2':
                case '3':
                    if ($penugasan->jenis == 3) {
                        $this->triggerSubmitLineRequest($request);
                    } else {
                        $this->triggerSubmitIGYTRequest($request);
                    }
                    return $this->submitIGYTLine($request, $penugasan);
                case '4':
            }
        } else {
            abort(404);
        }
    }

    private function triggerSubmitIGYTRequest(SubmitIGYTRequest $request)
    { }

    private function triggerSubmitLineRequest(SubmitLineRequest $request)
    { }

    private function submitIGYTLine($request, $penugasan)
    {
        if (count($request->jawaban) == count($penugasan->soal)) {
            $now = date('Y-m-d H:i:s');
            if ($now < $penugasan->waktu_mulai) {
                return redirect()->back()->with('alert', 'Penugasan belum dimulai');
            } else if ($now > $penugasan->waktu_akhir) {
                return redirect()->back()->with('alert', 'Waktu penugasan telah berakhir');
            } else {
                $errors = [];
                $error_messages = [];
                $soal = null;
                foreach ($request->jawaban as $index => $jawaban) {
                    foreach ($penugasan->soal as $soalPenugasan) {
                        if ($soalPenugasan->id === $jawaban['id']) {
                            $soal = $soalPenugasan;
                            break;
                        }
                    }

                    if ($soal) {
                        if ($penugasan->jenis == 1 || $penugasan->jenis == 2) {
                            if ($penugasan->jenis == 1) {
                                $urlChecker = 'https://api.instagram.com/oembed?url=';
                            } else {
                                $urlChecker = 'https://www.youtube.com/oembed?url=';
                            }
                            if (!$this->checkValidInstagramYoutubeUrl($urlChecker . $jawaban->url)) {
                                $errors[] = "jawaban[{$index}]";
                                $error_messages[] = "Link tidak valid";
                                break;
                            }
                        } else {
                            if ($jawaban['screenshot']) {
                                try {
                                    $screenshot = $request->file("jawaban[{$index}][screenshot]");
                                    $path = $screenshot->store('storage/uploads');
                                } catch (\Exception $e) {
                                    $errors[] = "jawaban[{$index}]";
                                    $error_messages[] = "Gambar tidak dapat disimpan";
                                    break;
                                }
                            } else {
                                $errors[] = "jawaban[{$index}]";
                                $error_messages[] = "Gambar tidak dapat disimpan";
                                break;
                            }
                        }

                        $submitJawaban = JawabanBeta::where([
                            'nim' => session('nim'),
                            'id_soal' => $soal->id,
                            'id_penugasan' => $penugasan->id
                        ])->first();

                        if (!$submitJawaban) {
                            $submitJawaban = JawabanBeta::create([
                                'nim' => session('nim'),
                                'id_soal' => $soal->id,
                                'id_penugasan' => $penugasan->id
                            ]);
                        } else {
                            if ($penugasan->jenis == 3 && $path && file_exists($submitJawaban->screenshot)) {
                                unlink($submitJawaban->screenshot);

                                $existFile = ProtectedFiles::find($submitJawaban->screenshot);
                                $existFile->delete();
                            }
                        }

                        ProtectedFile::create([
                            'nim' => session('nim'),
                            'id_soal' => $soal->id,
                            'path' => $path
                        ]);

                        $submitJawaban->screenshot = $path;
                        $submitJawaban->jawaban = $jawaban->url;
                        $submitJawaban->save();
                    } else {
                        $errors[] = "jawaban[{$index}]";
                        $error_messages[] = "ID soal tidak valid";
                    }
                }

                if ($errors) {
                    $validator = Validator::make([], []);
                    foreach ($errors as $index => $error) {
                        $validator->errors()->add($error, $error_messages[$index]);
                    }
                    return redirect()->back()->withErrors($validator);
                }
                return redirect()->back()->with('alert', 'Jawaban berhasil disimpan');
            }
        } else {
            abort(400);
        }
    }

    private function checkValidInstagramYoutubeUrl($url)
    {
        $url = $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $http_code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($http_code == 200) {
            return true;
        } else {
            return false;
        }
    }
}
