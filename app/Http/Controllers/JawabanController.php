<?php

namespace App\Http\Controllers;

use App\JawabanBeta;
use App\PenugasanBeta;
use App\ProtectedFile;
use App\Http\Requests\SubmitJawabanRequest;
use Illuminate\Support\Facades\Validator;

class JawabanController extends Controller
{
    public function index()
    {
        return view('v_mahasiswa/penugasan');
    }

    public function getViewJawaban($slug)
    {
        $penugasan = PenugasanBeta::where('slug', $slug)->first();

        if ($penugasan) {
            switch ($penugasan->jenis) {
                case '1':
                case '2':
                    return $this->getViewFormInstagramYoutube($penugasan);
                case '3':
                    return $this->getViewFormLine($penugasan);
                case '4':
                    return $this->startPilihanGanda($penugasan);
                case '5':
                    return $this->getViewPenugasanOffline($penugasan);
                default:
                    abort(500);
            }
        } else {
            abort(404);
        }
    }

    private function getViewFormInstagramYoutube($penugasan)
    {
        $jawabans = JawabanBeta::where([
            'nim' => session('nim')
        ])->whereHas('soal', function ($query) use ($penugasan) {
            $query->where('id_penugasan', $penugasan->id);
        })->get();
        return view('v_mahasiswa/kumpulVideoIG', compact('penugasan', 'jawabans'));
    }

    private function getViewFormLine($penugasan)
    {
        $jawabans = JawabanBeta::where([
            'nim' => session('nim')
        ])->whereHas('soal', function ($query) use ($penugasan) {
            $query->where('id_penugasan', $penugasan->id);
        })->get();
        return view('v_mahasiswa/kumpulLine', compact('penugasan', 'jawabans'));
    }

    private function startPilihanGanda($penugasan)
    {
        $soalBelumDijawab = [];
        $soalSudahDijawab = [];

        foreach ($penugasan->soal as $soal) {
            $jawaban = JawabanBeta::where([
                'nim' => session('nim'),
                'id_soal' => $soal->id
            ])->first();

            if (!$jawaban) {
                $soalBelumDijawab[] = $soal->id;
            } else {
                $soalSudahDijawab[] = $jawaban;
            }
        }

        if ($penugasan->random) {
            shuffle($soalBelumDijawab);
        }

        $thisSesssionNim = session('nim');

        foreach ($soalBelumDijawab as $jawabSoal) {
            $jawaban = JawabanBeta::create([
                'nim' => $thisSesssionNim,
                'id_soal' => $jawabSoal
            ]);

            $soalSudahDijawab[] = $jawaban;
        }

        foreach ($soalSudahDijawab as $index => $jawabSoal) {
            if (!$jawabSoal->jawaban) {
                return redirect()->route('penugasan.pilihan-ganda.view', [
                    'slug' => $penugasan->slug,
                    'index' => $index + 1,
                ]);
            }
        }

        return redirect()->route('penugasan.pilihan-ganda.view', [
            'slug' => $penugasan->slug,
            'index' => 1,
        ]);
    }

    public function getSoalPilihanGanda($slug, $index)
    {
        // TODO : Binding Pilihan Ganda
        $penugasan = PenugasanBeta::where('slug', $slug)->withCount(['soal'])
            ->first();
        if ($index <= $penugasan->soal_count && $index > 0) {
            $jawabans = JawabanBeta::where('nim', session('nim'))->whereHas('soal', function ($query) use ($penugasan) {
                $query->where('id_penugasan', $penugasan->id);
            })->get(['jawaban']);
            $jawaban = JawabanBeta::where('nim', session('nim'))->whereHas('soal', function ($query) use ($penugasan) {
                $query->where('id_penugasan', $penugasan->id);
            })->skip($index - 1)->first();

            return view('v_mahasiswa/detailPenugasanOffline', compact('penugasan', 'jawaban', 'jawabans'));
        } else {
            abort(400);
        }
    }

    private function getViewPenugasanOffline($penugasan)
    {
        return view('v_mahasiswa/detailPenugasanOffline', compact('penugasan'));
    }

    public function submitJawaban(SubmitJawabanRequest $request, $slug, $index = null)
    {
        $penugasan = PenugasanBeta::where('slug', $slug)->withCount(['soal'])->first();

        if ($penugasan) {
            if ($penugasan->jenis != 5) {
                $now = date('Y-m-d H:i:s');
                if ($now < $penugasan->waktu_mulai) {
                    return redirect()->route('penugasan.index')
                        ->with('alert', 'Penugasan belum dimulai');
                } else if ($now > $penugasan->waktu_akhir) {
                    return redirect()->route('penugasan.index')
                        ->with('alert', 'Waktu penugasan telah berakhir');
                }
            }
            switch ($penugasan->jenis) {
                case '1':
                case '2':
                case '3':
                    return $this->submitIGYTLine($request, $penugasan);
                case '4':
                    return $this->submitJawabanPilihanGanda($request, $penugasan, $index);
                default:
                    abort(500);
            }
        } else {
            abort(404);
        }
    }

    private function submitIGYTLine($request, $penugasan)
    {
        if (count($request->jawaban) == count($penugasan->soal)) {
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
                        if (!$this->checkValidUrl($urlChecker . $jawaban['url'])) {
                            $errors[] = "jawaban[{$index}]";
                            $error_messages[] = "Link tidak valid";
                            break;
                        }
                    } else {
                        if ($jawaban['screenshot']) {
                            try {
                                $screenshot = $request->file("jawaban[{$index}][screenshot]");
                                $path = $screenshot->store('storage/uploads');
                                $savePath = str_replace_first('storage', '', $path);
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
                        'id_soal' => $soal->id
                    ])->first();

                    if (!$submitJawaban) {
                        $submitJawaban = new JawabanBeta;
                        $submitJawaban->nim = session('nim');
                        $submitJawaban->id_soal = $soal->id;
                    } else {
                        if ($penugasan->jenis == 3 && file_exists(storage_path($submitJawaban->screenshot))) {
                            unlink(storage_path($submitJawaban->screenshot));

                            $existFile = ProtectedFiles::find($submitJawaban->screenshot);
                            $existFile->delete();
                        }
                    }

                    $submitJawaban->jawaban = $jawaban['url'];
                    $submitJawaban->save();

                    if ($penugasan->jenis == 3) {
                        ProtectedFile::create([
                            'id_jawaban' => $submitJawaban->id,
                            'path' => $savePath
                        ]);
                    }
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
        } else {
            abort(400);
        }
    }

    private function checkValidUrl($url)
    {
        $options = array(
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER         => false,    // don't return headers
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING       => "",       // handle all encodings
            CURLOPT_USERAGENT      => "spider", // who am i
            CURLOPT_AUTOREFERER    => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
            CURLOPT_TIMEOUT        => 120,      // timeout on response
            CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
            CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
        );
        $ch = curl_init($url);
        curl_setopt_array($ch, $options);
        curl_exec($ch);
        $http_code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($http_code == 200) {
            return true;
        } else {
            return false;
        }
    }

    private function submitJawabanPilihanGanda($request, $penugasan, $index)
    {
        if ($index <= $penugasan->soal_count && $index > 0) {
            $jawaban = JawabanBeta::where('nim', session('nim'))->whereHas('soal', function ($query) use ($penugasan) {
                $query->where('id_penugasan', $penugasan->id);
            })->skip($index - 1)->first();

            $jawaban->jawaban = $request->jawaban;
            $jawaban->save();

            if ($request->action) {
                switch ($request->action) {
                    case 'next':
                        return redirect()->route('penugasan.pilihan-ganda.view', [
                            'slug' => $penugasan->slug,
                            'index' => $index + 1,
                        ]);
                    case 'done':
                        return redirect()->route('penugasan.index')->with('alert', 'Jawaban berhasil disimpan');
                    default:
                        return redirect()->back();
                }
            } else {
                return redirect()->back();
            }
        } else {
            abort(400);
        }
    }
}
