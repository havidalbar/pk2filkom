<?php

namespace App\Http\Controllers;

use App\Bidang;
use App\JawabanKelompokPKMBeta;
use App\KelompokPKM;
use App\Mahasiswa;
use App\PenugasanBeta;
use App\Http\Requests\SubmitJawabanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JawabanKelompokPKMController extends Controller
{
    public function index()
    {
        $now = date('Y-m-d H:i:s');
        $penugasans = PenugasanBeta::where('waktu_tampil', '<', $now)
            ->whereIn('jenis', [8, 9])
            ->withCount(['soal'])
            ->orderBy('waktu_mulai', 'ASC')
            ->orderBy('waktu_akhir', 'ASC')
            ->get();

        foreach ($penugasans as $penugasan) {
            $penugasan->link_view = route('mahasiswa.penugasan-kelompok-pkm.view-jawaban', ['slug' => $penugasan->slug]);
        }

        return view('v_mahasiswa/penugasan', compact('penugasans'));
    }

    public function getViewJawaban($slug)
    {
        $penugasan = PenugasanBeta::where('slug', $slug)->first();

        if ($penugasan && ($penugasan->jenis == 8 || $penugasan->jenis == 9)) {
            $now = date('Y-m-d H:i:s');
            if ($now < $penugasan->waktu_mulai) {
                return redirect()->route('mahasiswa.penugasan.index')
                    ->with('alert', 'Penugasan ini belum dimulai');
            }
            switch ($penugasan->jenis) {
                case 8:
                case 9:
                    return $this->getViewAbstraksiKelompok($penugasan);
                default:
                    abort(500);
            }
        } else {
            abort(404);
        }
    }

    private function getViewAbstraksiKelompok($penugasan)
    {
        $jawabanAbstraksi = JawabanKelompokPKMBeta::whereHas('kelompok', function ($query) {
            return $query->where('nim_ketua', session('nim'))
                ->orWhere('nim_anggota1', session('nim'))
                ->orWhere('nim_anggota2', session('nim'));
        })->whereHas('soal', function ($query) use ($penugasan) {
            $query->where('id_penugasan', $penugasan->id);
        })->first();

        $mahasiswa = Mahasiswa::find(session('nim'));
        $bidangs = Bidang::all();

        return view('v_mahasiswa/pendataanPkm', compact('penugasan', 'jawabanAbstraksi', 'bidangs', 'mahasiswa'));
    }

    public function submitJawaban(SubmitJawabanRequest $request, $slug)
    {
        $penugasan = PenugasanBeta::where('slug', $slug)->withCount(['soal'])->first();

        if ($penugasan) {
            $now = date('Y-m-d H:i:s');
            if ($now < $penugasan->waktu_mulai) {
                return redirect()->route('mahasiswa.penugasan.index')
                    ->with('alert', 'Penugasan belum dimulai');
            } else if ($now > $penugasan->waktu_akhir) {
                return redirect()->route('mahasiswa.penugasan.index')
                    ->with('alert', 'Penugasan ini telah berakhir');
            }

            switch ($penugasan->jenis) {
                case 8:
                    return $this->submitAbstraksi($request, $penugasan);
                case 9:
                    return $this->submitLinkUmum($request, $penugasan);
                default:
                    abort(500);
            }
        } else {
            abort(404);
        }
    }

    private function submitLinkUmum($request, $penugasan)
    {
        $kelompok = KelompokPKM::where('nim_ketua', session('nim'))
            ->orWhere('nim_anggota1', session('nim'))
            ->orWhere('nim_anggota2', session('nim'))
            ->first();
        if (count($request->jawaban) == count($penugasan->soal)) {
            $errors = [];
            $error_messages = [];
            foreach ($request->jawaban as $index => $jawaban) {
                $soal = null;
                foreach ($penugasan->soal as $soalPenugasan) {
                    if ($soalPenugasan->id === $jawaban['id']) {
                        $soal = $soalPenugasan;
                        break;
                    }
                }

                if ($soal) {
                    $submitJawaban = new JawabanKelompokPKMBeta;
                    $submitJawaban->id_kelompok = $kelompok->id;
                    $submitJawaban->id_soal = $soal->id;
                    $submitJawaban->jawaban = $jawaban['url'];
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
        } else {
            abort(400);
        }
    }

    private function submitAbstraksi($request, $penugasan)
    {
        $mahasiswas = [];
        $mahasiswas[] = $request->nim_ketua;
        $mahasiswas[] = $request->nim_anggota1;
        $mahasiswas[] = $request->nim_anggota2;

        if (
            $request->nim_ketua === $request->nim_anggota1
            || $request->nim_anggota1 === $request->nim_anggota2
            || $request->nim_ketua === $request->nim_anggota2
        ) {
            return redirect()->back()->with('alert', 'NIM tiap anggota harus berbeda');
        }

        foreach ($mahasiswas as $mahasiswa) {
            $mahasiswa_obj = Mahasiswa::where('nim', $mahasiswa)->first();
            if ($mahasiswa_obj->kelompok_pkm) {
                return redirect()->back()->with('alert', 'Mahasiswa ' . $mahasiswa . ' sudah terdaftar dalam kelompok lain');
            }
        }

        if (
            KelompokPKM::where('bidang', $request->bidang)->count()
            >=
            Bidang::where('bidang', $request->bidang)->first()->kuota
        ) {
            return redirect()->back()->with('alert', 'Kuota PKM bidang ' . $request->bidang . ' sudah penuh');
        }

        try {
            DB::beginTransaction();

            $kelompok = new KelompokPKM;
            $kelompok->bidang = $request->bidang;
            $kelompok->nomor = KelompokPKM::count() + 1;
            $kelompok->nim_ketua = $request->nim_ketua;
            $kelompok->nim_anggota1 = $request->nim_anggota1;
            $kelompok->nim_anggota2 = $request->nim_anggota2;
            $kelompok->save();

            $submitJawabanAbstraksi = new JawabanKelompokPKMBeta;
            $submitJawabanAbstraksi->id_kelompok = $kelompok->id;
            $submitJawabanAbstraksi->id_soal = $penugasan->soal[0]->id;
            $submitJawabanAbstraksi->jawaban = $request->abstraksi;
            $submitJawabanAbstraksi->save();
            DB::commit();

            return redirect()->back()
                ->with('alert', 'Pendataan dan abstraksi berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('alert', 'Terjadi kesalahan data');
        }
    }
}
