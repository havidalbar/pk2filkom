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

    protected $appends = [
        'rekap_nilai_pk2maba',
        'rekap_nilai_startup',
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

    public function getRekapNilaiPk2mabaAttribute()
    {
        return [
            'absensi' => PK2MabaAbsensi::setEagerLoads([])->where('nim', $this->nim)->first(),
            'keaktifan' => PK2MabaKeaktifan::setEagerLoads([])->where('nim', $this->nim)->first(),
            'pelanggaran' => PK2MabaPelanggaran::setEagerLoads([])->where('nim', $this->nim)->first(),
        ];
    }

    public function getRekapNilaiStartupAttribute()
    {
        return [
            'absensi' => StartupAbsensi::setEagerLoads([])->where('nim', $this->nim)->first(),
            'keaktifan' => StartupKeaktifan::setEagerLoads([])->where('nim', $this->nim)->first(),
            'pelanggaran' => StartupPelanggaran::setEagerLoads([])->where('nim', $this->nim)->first(),
        ];
    }
}
