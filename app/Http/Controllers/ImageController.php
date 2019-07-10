<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Intervention\Image\ImageManagerStatic as Image;

class ImageController extends Controller
{
    public function call()
    {
        $mahasiswas = Mahasiswa::all();
        for ($i = 0; $i < count($mahasiswas); $i++) {
            $this->textOnImage($mahasiswas[$i]->nama, $mahasiswas[$i]->nim, "SISTEM INFORMASI", "1", "0", "MAKA MAKAN MAKAN MAKAN MAKAN", "OBATT OBATT OBATT OBATT OBATT", "SAKITT SAKITT SAKITT SAKITT SAKITT");
        }
    }

    public function textOnImage($nama, $nim, $prodi, $cluster, $kelompok, $makan, $obat, $sakit)
    {
        $img = "";
        $prodi_singkat = "";
        if (strtoupper($prodi) == "TEKNIK INFORMATIKA") {
            $img = Image::make('img/nametag/TIF.jpg');
            $prodi_singkat = "TIF";
        } else if (strtoupper($prodi) == "SISTEM INFORMASI") {
            $img = Image::make('img/nametag/SI.jpg');
            $prodi_singkat = "SI";
        } else if (strtoupper($prodi) == "TEKNIK KOMPUTER") {
            $img = Image::make('img/nametag/TEKKOM.jpg');
            $prodi_singkat = "TEKKOM";
        } else if (strtoupper($prodi) == "PENDIDIKAN TEKNOLOGI INFORMASI") {
            $img = Image::make('img/nametag/PTI.jpg');
            $prodi_singkat = "PTI";
        } else if (strtoupper($prodi) == "TEKNOLOGI INFORMASI") {
            $img = Image::make('img/nametag/TI.jpg');
            $prodi_singkat = "TI";
        }
        $img->text($nama, 1154, 820, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(27);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $img->text($nim, 1153, 862, function ($font) {
            $font->file(public_path('/font/Gotham Book Regular.otf'));
            $font->size(30);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $img->text($prodi, 1152, 945, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(28);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $img->text("CLUSTER " . $cluster, 1149, 1015, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(28);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $img->text("KELOMPOK " . $kelompok, 1151, 1085, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(28);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });

        $img->text($makan, 405, 425, function ($font) {
            $font->file(public_path('/font/Gotham Book Regular.otf'));
            $font->size(25);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });

        $img->text($obat, 400, 685, function ($font) {
            $font->file(public_path('/font/Gotham Book Regular.otf'));
            $font->size(25);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });

        $img->text($sakit, 400, 935, function ($font) {
            $font->file(public_path('/font/Gotham Book Regular.otf'));
            $font->size(25);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $img->save(public_path('img/nametag_edit/' . $prodi_singkat . '/' . $nim . '.jpg'));
        //return $img->response('jpg');
    }
}
