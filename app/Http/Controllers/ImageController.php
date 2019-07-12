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
        $prodi = "Teknik Komputer";
        $cluster = "1";
        $kelompok = "0";
        $makan = "MAKA MAKAN MAKAN MAKAN MAKAN";
        $obat = "OBATT OBATT OBATT OBATT OBATT";
        $sakit = "SAKITT SAKITT SAKITT SAKITT SAKITT";
        $imgNameTag = "";
        $prodi_singkat = "";
        $imgBagHolder = "";
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
        $imgNameTag->text($nama, 991, 685, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(21);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $imgNameTag->text($nim, 990, 717, function ($font) {
            $font->file(public_path('/font/Gotham Book Regular.otf'));
            $font->size(20);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $imgNameTag->text($prodi, 989, 800, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(21);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $imgNameTag->text("CLUSTER " . $cluster, 986, 860, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(21);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $imgNameTag->text("KELOMPOK " . $kelompok, 988, 920, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(21);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });

        $imgNameTag->text($makan, 345, 360, function ($font) {
            $font->file(public_path('/font/Gotham Book Regular.otf'));
            $font->size(21);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });

        $imgNameTag->text($obat, 340, 580, function ($font) {
            $font->file(public_path('/font/Gotham Book Regular.otf'));
            $font->size(21);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });

        $imgNameTag->text($sakit, 340, 795, function ($font) {
            $font->file(public_path('/font/Gotham Book Regular.otf'));
            $font->size(21);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        // $imgNameTag->save(public_path('img/nametag_edit/' . $prodi_singkat . '/' . $nim . '.jpg'));
        //return $img->response('jpg');

        //bagholder
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
                // $imgBagHolder->save(public_path('img/bagholder_edit/' . $prodi_singkat . '/' . $nim . '.jpg'));
        //return $imgBagHolder->response('jpg');

        return view('v_mahasiswa/nametag',['nametag'=>$imgNameTag, 'bagholder'=>$imgBagHolder]);
    }
}
