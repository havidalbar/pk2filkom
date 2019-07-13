<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Intervention\Image\ImageManagerStatic as Image;
// use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Session;

class ImageController extends Controller
{
    // public function call()
    // {
    //     $mahasiswa = Mahasiswa::find(Session::get('nim'));
    //     $this->textOnImage($mahasiswa->nama, $mahasiswa->nim, "Teknik Komputer", "1", "0", "MAKA MAKAN MAKAN MAKAN MAKAN", "OBATT OBATT OBATT OBATT OBATT", "SAKITT SAKITT SAKITT SAKITT SAKITT");

    // }

    public function textOnImageNametag()
    {
        $mahasiswa = Mahasiswa::find(Session::get('nim'));
        $nama = $mahasiswa->nama;
        $nim = $mahasiswa->nim;
        $prodi = strtoupper($mahasiswa->prodi);
        $cluster = $mahasiswa->cluster;
        $kelompok = $mahasiswa->kelompok;
        $makan = $mahasiswa->alergi_makanan;
        $obat = $mahasiswa->alergi_obat;
        $sakit = $mahasiswa->riwayat_penyakit;
        $imgNameTag = "";
        $prodi_singkat = "";
        $imgBagHolder = "";

        if (strtoupper($prodi) == "TEKNIK INFORMATIKA") {
            $prodi_singkat = "TIF";
        } else if (strtoupper($prodi) == "SISTEM INFORMASI") {
            $prodi_singkat = "SI";
        } else if (strtoupper($prodi) == "TEKNIK KOMPUTER") {
            $prodi_singkat = "TEKKOM";
        } else if (strtoupper($prodi) == "PENDIDIKAN TEKNOLOGI INFORMASI") {
            $prodi_singkat = "PTI";
        } else if (strtoupper($prodi) == "TEKNOLOGI INFORMASI") {
            $prodi_singkat = "TI";
        }

        $imgNameTag = Image::make('img/nametag/' . $prodi_singkat . '.jpg');
        $imgBagHolder = Image::make('img/bagholder/' . $prodi_singkat . '.jpg');

        // Nametag
        $centerNametagKanan = $imgNameTag->width() * 0.75;
        $centerNametagKiri = $imgNameTag->width() * 0.265;

        // Trim Nama
        $nama_array = explode(' ', strtoupper($nama));
        $namaText = "";
        $limit = 32;
        for ($i = 0; $i < count($nama_array); $i++) {
            if ($i) {
                if (strlen($namaText . ' ' . $nama_array[$i]) >= $limit) {
                    for ($j = $i; $j < count($nama_array); $j++) {
                        if (strlen($namaText . ' ' . $nama_array[$i][0]) > $limit) {
                            break 2;
                        } else {
                            $namaText = $namaText . ' ' . $nama_array[$i][0];
                        }
                    }
                    break;
                } else {
                    $namaText = $namaText . ' ' . $nama_array[$i];
                }
            } else {
                if (strlen($nama_array[$i]) >= $limit) {
                    $namaText = substr($nama_array[$i], 0, $limit);
                    break;
                } else {
                    $namaText = $namaText . $nama_array[$i];
                }
            }
        }

        $imgNameTag->text($namaText, $centerNametagKanan, 688, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(21);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $imgNameTag->text($nim, $centerNametagKanan, 720, function ($font) {
            $font->file(public_path('/font/Gotham Book Regular.otf'));
            $font->size(20);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $imgNameTag->text($prodi, $centerNametagKanan, 804, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(21);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $imgNameTag->text("CLUSTER " . $cluster, $centerNametagKanan, 864, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(21);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $imgNameTag->text("KELOMPOK " . $kelompok, $centerNametagKanan, 920, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(21);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });

        $imgNameTag->text($makan, $centerNametagKiri, 360, function ($font) {
            $font->file(public_path('/font/Gotham Book Regular.otf'));
            $font->size(21);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $imgNameTag->text($obat, $centerNametagKiri, 580, function ($font) {
            $font->file(public_path('/font/Gotham Book Regular.otf'));
            $font->size(21);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $imgNameTag->text($sakit, $centerNametagKiri, 795, function ($font) {
            $font->file(public_path('/font/Gotham Book Regular.otf'));
            $font->size(21);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $imgNameTag->encode('data-url', 100);
        // $imgNameTag->save(public_path('img/nametag_edit/' . $prodi_singkat . '/' . $nim . '.jpg'));
        // return $img->response('jpg');

        // Bagholder
        $bagholderCenter = $imgBagHolder->width() / 2;
        // Trim Nama
        $nama_array = explode(' ', strtoupper($namaText));
        $namaText = "";
        $limit = 22;
        for ($i = 0; $i < count($nama_array); $i++) {
            if ($i) {
                if (strlen($namaText . ' ' . $nama_array[$i]) >= $limit) {
                    for ($j = $i; $j < count($nama_array); $j++) {
                        if (strlen($namaText . ' ' . $nama_array[$i][0]) > $limit) {
                            break 2;
                        } else {
                            $namaText = $namaText . ' ' . $nama_array[$i][0];
                        }
                    }
                    break;
                } else {
                    $namaText = $namaText . ' ' . $nama_array[$i];
                }
            } else {
                if (strlen($nama_array[$i]) >= $limit) {
                    $namaText = substr($nama_array[$i], 0, $limit);
                    break;
                } else {
                    $namaText = $namaText . $nama_array[$i];
                }
            }
        }

        $imgBagHolder->text($namaText, $bagholderCenter, 70, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(11);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $imgBagHolder->text("CLUSTER " . $cluster, $bagholderCenter, 108, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(11);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $imgBagHolder->text("KELOMPOK " . $kelompok, $bagholderCenter, 146, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(11);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $imgBagHolder->encode('data-url', 100);
        // $imgNametagEncode = 'data:image/' . $imgBagHolder->encode('jpg', 100); . ';base64,' . base64_encode($imgNametag);
        // $imgBagHolder->save(public_path('img/bagholder_edit/' . $prodi_singkat . '/' . $nim . '.jpg'));
        // return $imgBagHolder->response('jpg');

        return view('v_mahasiswa/nametag', ['nametag' => $imgNameTag, 'bagholder' => $imgBagHolder]);
    }
}
