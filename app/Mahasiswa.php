<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $primaryKey = 'nim';
	public $incrementing = false;
	
    protected $casts = [
        'nim' => 'string',
    ];

    public function getJenisKelaminAttribute($value)
    {
        switch ($value) {
            case 1:
                return 'Laki-laki';
            case 2:
                return 'Perempuan';
            case 9:
                return 'Tidak terdefinisi';
            default:
                return 'Tidak diketahui';
        }
    }

    public function getProdiAttribute($value)
    {
        switch ($value) {
            case 2:
                return 'Teknik Informatika';
            case 3:
                return 'Teknik Komputer';
            case 4:
                return 'Sistem Informasi';
            case 6:
                return 'Pendidikan Teknologi Informasi';
            case 7:
                return 'Teknologi Informasi';
            default:
                return 'Tidak diketahui';
        }
    }

    public function getAgamaAttribute($value)
    {
        switch ($value) {
            case 1:
                return 'Buddha';
            case 2:
                return 'Hindu';
            case 3:
                return 'Islam';
            case 4:
                return 'Katolik';
            case 5:
                return 'Kristen Protestan';
            case 6:
                return 'Kong Hu Cu';
            case 9:
                return 'Tidak terdefinisi';
            default:
                return 'Tidak diketahui';
        }
    }
}
