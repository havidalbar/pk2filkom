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
        $imgNameTag = "";
        $imgBagHolder = "";
        $prodi_singkat = "";
        if (strtoupper($prodi) == "TEKNIK INFORMATIKA") {
            $imgNameTag = Image::make('img/nametag/TIF.jpg');
            $imgBagHolder = Image::make('img/bagholder/TIF.jpg');
            $prodi_singkat = "TIF";
        } else if (strtoupper($prodi) == "SISTEM INFORMASI") {
            $imgNameTag = Image::make('img/nametag/SI.jpg');
            $imgBagHolder = Image::make('img/bagholder/SI.jpg');
            $prodi_singkat = "SI";
        } else if (strtoupper($prodi) == "TEKNIK KOMPUTER") {
            $imgNameTag = Image::make('img/nametag/TEKKOM.jpg');
            $imgBagHolder = Image::make('img/bagholder/TEKKOM.jpg');
            $prodi_singkat = "TEKKOM";
        } else if (strtoupper($prodi) == "PENDIDIKAN TEKNOLOGI INFORMASI") {
            $imgNameTag = Image::make('img/nametag/PTI.jpg');
            $imgBagHolder = Image::make('img/bagholder/PTI.jpg');
            $prodi_singkat = "PTI";
        } else if (strtoupper($prodi) == "TEKNOLOGI INFORMASI") {
            $imgNameTag = Image::make('img/nametag/TI.jpg');
            $imgBagHolder = Image::make('img/bagholder/TI.jpg');
            $prodi_singkat = "TI";
        }
        //nametag
        $imgNameTag->text($nama, 1154, 820, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(27);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $imgNameTag->text($nim, 1153, 862, function ($font) {
            $font->file(public_path('/font/Gotham Book Regular.otf'));
            $font->size(30);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $imgNameTag->text($prodi, 1152, 945, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(28);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $imgNameTag->text("CLUSTER " . $cluster, 1149, 1015, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(28);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $imgNameTag->text("KELOMPOK " . $kelompok, 1151, 1085, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(28);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });

        $imgNameTag->text($makan, 405, 425, function ($font) {
            $font->file(public_path('/font/Gotham Book Regular.otf'));
            $font->size(25);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });

        $imgNameTag->text($obat, 400, 685, function ($font) {
            $font->file(public_path('/font/Gotham Book Regular.otf'));
            $font->size(25);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });

        $imgNameTag->text($sakit, 400, 935, function ($font) {
            $font->file(public_path('/font/Gotham Book Regular.otf'));
            $font->size(25);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });

        $imgNameTag->save(public_path('img/nametag_edit/' . $prodi_singkat . '/' . $nim . '.jpg'));
        //return $imgNameTag->response('jpg');

        //bagholder
        $imgBagHolder->text($nama, 1154, 820, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(27);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $imgBagHolder->text($cluster, 1153, 862, function ($font) {
            $font->file(public_path('/font/Gotham Book Regular.otf'));
            $font->size(30);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $imgBagHolder->text($kelompok, 1152, 945, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(28);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });

        $imgBagHolder->save(public_path('img/bagholder_edit/' . $prodi_singkat . '/' . $nim . '.jpg'));
        //return $imgBagHolder->response('jpg');
    }
}
