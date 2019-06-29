<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MahasiswaController extends Controller
{
    //
    public function getQRCodeAbsensiOpenHouse()
    {
        echo '<img src="data:image/png;base64, ' . base64_encode(QrCode::format('png')->size(400)->generate(url('absensi-open-house?nim=') . encrypt('175150200111019'))) . ' ">';
    }
}
