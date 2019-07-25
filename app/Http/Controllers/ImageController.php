<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Intervention\Image\ImageManagerStatic as Image;
// use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Session;

class ImageController extends Controller
{
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

        switch (strtoupper($prodi)) {
            case 'SISTEM INFORMASI':
                $prodi_singkat = "SI";
                break;
            case 'TEKNIK KOMPUTER':
                $prodi_singkat = "TEKKOM";
                break;
            case 'PENDIDIKAN TEKNOLOGI INFORMASI':
                $prodi_singkat = "PTI";
                break;
            case 'TEKNOLOGI INFORMASI':
                $prodi_singkat = "TI";
                break;
            case 'TEKNIK INFORMATIKA':
            default:
                $prodi_singkat = "TIF";
        }

        $imgNameTag = Image::make(public_path('img/nametag/' . $prodi_singkat . '.jpg'));
        $imgBagHolder = Image::make(public_path('img/bagholder/' . $prodi_singkat . '.jpg'));

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
        $imgNameTag->text('CLUSTER ' . $cluster, $centerNametagKanan, 864, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(21);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $imgNameTag->text('KELOMPOK ' . $kelompok, $centerNametagKanan, 920, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(21);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });

        $imgNameTag->text($this->generateWrappedTextKartuKesehatanKendali($makan), $centerNametagKiri, 360, function ($font) {
            $font->file(public_path('/font/Gotham Book Regular.otf'));
            $font->size(21);
            $font->color('#000');
            $font->align('center');
            $font->valign('top');
            $font->angle(0);
        });
        $imgNameTag->text($this->generateWrappedTextKartuKesehatanKendali($obat), $centerNametagKiri, 580, function ($font) {
            $font->file(public_path('/font/Gotham Book Regular.otf'));
            $font->size(21);
            $font->color('#000');
            $font->align('center');
            $font->valign('top');
            $font->angle(0);
        });
        $imgNameTag->text($this->generateWrappedTextKartuKesehatanKendali($sakit), $centerNametagKiri, 795, function ($font) {
            $font->file(public_path('/font/Gotham Book Regular.otf'));
            $font->size(21);
            $font->color('#000');
            $font->align('center');
            $font->valign('top');
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

        $imgBagHolder->text($namaText, $bagholderCenter, 276, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(40);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $imgBagHolder->text('CLUSTER ' . $cluster, $bagholderCenter, 435, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(40);
            $font->color('#000');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        });
        $imgBagHolder->text('KELOMPOK ' . $kelompok, $bagholderCenter, 595, function ($font) {
            $font->file(public_path('/font/Gotham-Bold.otf'));
            $font->size(40);
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

    private function generateWrappedTextKartuKesehatanKendali($text)
    {
        $text_array = explode(' ', $text);
        $result_array = [];
        $limit = 40;
        $line = '';
        for ($i = 0; $i < count($text_array); $i++) {
            if (count($result_array) >= 4) {
                break;
            }

            if (strlen($text_array[$i]) > $limit) {
                if ($line) {
                    $result_array[] = $line;
                    $line = '';
                }
                $result_array[] = substr($text_array[$i], 0, $limit - 4) . '...';
            } else {
                if (strlen($line . ($line ? ' ' : '') . $text_array[$i]) >= $limit) {
                    $result_array[] = $line;
                    $line = $text_array[$i];
                } else {
                    $line = $line . ($line ? ' ' : '') . $text_array[$i];
                }
            }
        }
        if (!$result_array) {
            $result_array[] = $line;
        }

        return implode("\n", $result_array);
    }
}
