<?php

namespace App\Http\Controllers;

use App\JawabanBeta;
use App\PenugasanBeta;
use App\ProtectedFile;
use App\Http\Requests\SubmitJawabanRequest;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    public function index()
    {
        $now = date('Y-m-d H:i:s');
        $penugasans = PenugasanBeta::where('waktu_tampil', '<', $now)
            ->withCount(['soal'])
            ->orderBy('waktu_mulai', 'ASC')
            ->orderBy('waktu_akhir', 'ASC')
            ->get();

        return view('v_mahasiswa/penugasan', compact('penugasans'));
    }

    public function getViewJawaban($slug)
    {
        $penugasan = PenugasanBeta::where('slug', $slug)->first();

        if ($penugasan) {
            $now = date('Y-m-d H:i:s');
            if ($now < $penugasan->waktu_mulai) {
                return redirect()->route('mahasiswa.penugasan.index')
                    ->with('alert', 'Penugasan belum dimulai');
            }
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
                case '6':
                    return $this->getViewTTS($penugasan);
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
                return redirect()->route('mahasiswa.penugasan.pilihan-ganda.view', [
                    'slug' => $penugasan->slug,
                    'index' => $index + 1,
                ]);
            }
        }

        return redirect()->route('mahasiswa.penugasan.pilihan-ganda.view', [
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

    private function getViewTTS($penugasan)
    {
        $soalTts = $penugasan->soal;
        $menuruns = [];
        $mendatars = [];
        $jawabans = [];
        $expired = false;

        $now = date('Y-m-d H:i:s');
        if ($now < $penugasan->waktu_mulai || $now > $penugasan->waktu_akhir) {
            $expired = true;
        } else {
            $firstJawaban = JawabanBeta::where('nim', session('nim'))
                ->whereHas('soal', function ($query) use ($penugasan) {
                    $query->where('id_penugasan', $penugasan->id);
                })->orderBy('created_at', 'asc')->first();

            if ($penugasan->batas_waktu && $firstJawaban) {
                $newtimestamp = strtotime("{$firstJawaban->created_at} + {$penugasan->batas_waktu} minute");
                $limit = date('Y-m-d H:i:s', $newtimestamp);
                if ($now > $limit) {
                    $expired = true;
                }
            }
        }

        $jawabanDB = JawabanBeta::where([
            'nim' => session('nim')
        ])->whereHas('soal', function ($query) use ($penugasan) {
            $query->where('id_penugasan', $penugasan->id);
        })->get();

        $isJawabanSubmitted = $jawabanDB ? true : false;

        if ($isJawabanSubmitted) {
            foreach ($jawabanDB as $jDB) {
                $jawabans[] = $jDB;
            }
        }

        foreach ($soalTts as $index => $soal) {
            $decodedSoal = $soal->soal;

            foreach ($jawabans as $jawaban) {
                if ($jawaban->id_soal === $soal->id) {
                    $submittedJawaban = $jawaban;
                    break;
                }
            }

            if (empty($submittedJawaban)) {
                $submittedJawaban = JawabanBeta::create([
                    'nim' => session('nim'),
                    'id_soal' => $soal->id
                ]);
                $jawabans[] = $submittedJawaban;
            }

            if ($submittedJawaban->jawaban) {
                $decodedSoal->jawaban = $submittedJawaban->jawaban;
            } else {
                $panjang = ($decodedSoal->tipe == 'menurun'
                    ? $decodedSoal->posisi->endx - $decodedSoal->posisi->startx
                    : $decodedSoal->posisi->endy - $decodedSoal->posisi->starty) + 1;

                $tempJawaban = '';
                for ($i = 0; $i < $panjang; $i++) {
                    $tempJawaban = $tempJawaban . '_';
                }

                $decodedSoal->jawaban = $submittedJawaban->jawaban = $tempJawaban;
                $submittedJawaban->save();
            }

            $decodedSoal->noSoal = $index + 1;
            if ($decodedSoal->tipe == 'menurun') {
                $menuruns[] = $decodedSoal;
            } else if ($decodedSoal->tipe == 'mendatar') {
                $mendatars[] = $decodedSoal;
            }

            unset($submittedJawaban);
        }

        $menuruns = json_encode($menuruns);
        $mendatars = json_encode($mendatars);
        $jwt = $this->jwt();

        return view('v_mahasiswa/tts', compact('penugasan', 'mendatars', 'menuruns', 'jwt', 'expired'));
    }

    public function submitJawaban(SubmitJawabanRequest $request, $slug, $index = null)
    {
        $penugasan = PenugasanBeta::where('slug', $slug)->withCount(['soal'])->first();

        if ($penugasan) {
            $now = date('Y-m-d H:i:s');
            if ($now < $penugasan->waktu_mulai) {
                return redirect()->route('mahasiswa.penugasan.index')
                    ->with('alert', 'Penugasan belum dimulai');
            } else if ($now > $penugasan->waktu_akhir) {
                return redirect()->route('mahasiswa.penugasan.index')
                    ->with('alert', 'Waktu penugasan telah berakhir');
            } else {
                $firstJawaban = JawabanBeta::where('nim', session('nim'))
                    ->whereHas('soal', function ($query) use ($penugasan) {
                        $query->where('id_penugasan', $penugasan->id);
                    })->orderBy('created_at', 'asc')->first();

                if ($penugasan->batas_waktu && $firstJawaban) {
                    $newtimestamp = strtotime("{$firstJawaban->created_at} + {$penugasan->batas_waktu} minute");
                    $limit = date('Y-m-d H:i:s', $newtimestamp);
                    if ($now > $limit) {
                        return redirect()->route('mahasiswa.penugasan.index')
                            ->with('alert', 'Waktu pengerjaanmu telah habis');
                    }
                }
            }

            switch ($penugasan->jenis) {
                case '1':
                case '2':
                case '3':
                    return $this->submitIGYTLine($request, $penugasan);
                case '4':
                    return $this->submitJawabanPilihanGanda($request, $penugasan, $index);
                case '6':
                    $nim = session('nim');
                    $this->submitTts($request, $penugasan, $nim);
                    return redirect()->back()->with('alert', 'Jawaban berhasil disimpan');;
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
                        try {
                            file_get_contents($urlChecker . $jawaban['url']);
                            $valid = true;
                        } catch (\Exception $e) {
                            $valid = false;
                        }
                        if (!$valid) {
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
                        return redirect()->route('mahasiswa.penugasan.pilihan-ganda.view', [
                            'slug' => $penugasan->slug,
                            'index' => $index + 1,
                        ]);
                    case 'done':
                        return redirect()->route('mahasiswa.penugasan.index')->with('alert', 'Jawaban berhasil disimpan');
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

    private function jwt()
    {
        $payload = [
            'iss' => "simaba-filkom-2019", // Issuer of the token
            'nim' => session('nim'), // Subject of the token
            'iat' => time(), // Time when JWT was issued.
            'exp' => time() + (60 * 60 * 24 * 365), // Expiration time
        ];
        // As you can see we are passing `JWT_SECRET` as the second parameter that will
        // be used to decode the token in the future.
        return JWT::encode($payload, env('SECRET_TOKEN_KEY'), 'HS256');
    }

    public function apiSubmitTts(Request $request, $slug)
    {
        $penugasan = PenugasanBeta::where('slug', $slug)->first();
        $nim = $request->nim;

        $firstJawaban = JawabanBeta::where('nim', $nim)
            ->whereHas('soal', function ($query) use ($penugasan) {
                $query->where('id_penugasan', $penugasan->id);
            })->orderBy('created_at', 'asc')->first();

        if (!$firstJawaban) {
            return response()->json([], 400);
        }

        $newtimestamp = strtotime("{$firstJawaban->created_at} + {$penugasan->batas_waktu} minute");
        $limit = date('Y-m-d H:i:s', $newtimestamp);
        $now = date('Y-m-d H:i:s');
        if ($now > $limit) {
            return response()->json([], 403);
        }

        $this->submitTts($request, $penugasan, $nim);

        return response()->json();
    }

    private function submitTts($request, $penugasan, $nim)
    {
        $jawabans = JawabanBeta::where('nim', $nim)
            ->whereHas('soal', function ($query) use ($penugasan) {
                $query->where('id_penugasan', $penugasan->id);
            })->get();

        foreach ($penugasan->soal as $soal) {
            $jawabSoal = null;
            foreach ($jawabans as $jawaban) {
                if ($jawaban->id_soal == $soal->id) {
                    $jawabSoal = $jawaban;
                    break;
                }
            }

            if (!$jawabSoal) {
                $jawabSoal = new JawabanBeta;
                $jawabSoal->nim = $nim;
                $jawabSoal->id_soal = $soal->id;
            }

            $dataSoal = $soal->soal;

            if ($dataSoal->tipe === 'menurun') {
                $isiJawaban = '';
                for ($i = $dataSoal->posisi->startx; $i <= $dataSoal->posisi->endx; $i++) {
                    if (empty($request->jawaban[$i][$dataSoal->posisi->y]) || !$request->jawaban[$i][$dataSoal->posisi->y]) {
                        $isiJawaban = $isiJawaban . '_';
                    } else {
                        $isiJawaban = $isiJawaban . strtoupper($request->jawaban[$i][$dataSoal->posisi->y][0]);
                    }
                }
            } else {
                $isiJawaban = '';
                for ($i = $dataSoal->posisi->starty; $i <= $dataSoal->posisi->endy; $i++) {
                    if (empty($request->jawaban[$dataSoal->posisi->x][$i]) || !$request->jawaban[$dataSoal->posisi->x][$i]) {
                        $isiJawaban = $isiJawaban . '_';
                    } else {
                        $isiJawaban = $isiJawaban . $request->jawaban[$dataSoal->posisi->x][$i][0];
                    }
                }
            }

            $jawabSoal->jawaban = $isiJawaban;
            $jawabSoal->save();
        }
    }
}
