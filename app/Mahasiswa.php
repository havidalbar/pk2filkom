<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $primaryKey = 'nim';
    public $incrementing = false;

    protected $fillable = [
        'nim',
        'nama',
        'prodi'
    ];

    protected $casts = [
        'nim' => 'string',
    ];

    protected $appends = [
        'rekap_nilai_pk2maba',
        'rekap_nilai_pkm',
        'rekap_nilai_startup',
        'rekap_nilai_prodi',
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

    public function pk2maba_absensi()
    {
        return $this->hasOne('App\PK2MabaAbsensi', 'nim', 'nim');
    }

    public function pk2maba_keaktifan()
    {
        return $this->hasOne('App\PK2MabaKeaktifan', 'nim', 'nim');
    }

    public function pk2maba_pelanggaran()
    {
        return $this->hasOne('App\PK2MabaPelanggaran', 'nim', 'nim');
    }

    public function getRekapNilaiPk2mabaAttribute()
    {
        return [
            'absensi' => $this->pk2maba_absensi,
            'keaktifan' => $this->pk2maba_keaktifan,
            'pelanggaran' => $this->pk2maba_pelanggaran,
        ];
    }

    public function startup_absensi()
    {
        return $this->hasOne('App\StartupAbsensi', 'nim', 'nim');
    }

    public function startup_keaktifan()
    {
        return $this->hasOne('App\StartupKeaktifan', 'nim', 'nim');
    }

    public function startup_pelanggaran()
    {
        return $this->hasOne('App\StartupPelanggaran', 'nim', 'nim');
    }

    public function getRekapNilaiStartupAttribute()
    {
        return [
            'absensi' => $this->startup_absensi,
            'keaktifan' => $this->startup_keaktifan,
            'pelanggaran' => $this->startup_pelanggaran,
        ];
    }

    public function pkm_absensi()
    {
        return $this->hasOne('App\StartupAbsensi', 'nim', 'nim');
    }

    public function pkm_keaktifan()
    {
        return $this->hasOne('App\StartupKeaktifan', 'nim', 'nim');
    }

    public function pkm_pelanggaran()
    {
        return $this->hasOne('App\StartupPelanggaran', 'nim', 'nim');
    }

    public function getRekapNilaiPkmAttribute()
    {
        return [
            'absensi' => $this->pkm_absensi,
            'keaktifan' => $this->pkm_keaktifan,
            'pelanggaran' => $this->pkm_pelanggaran,
        ];
    }

    public function nilai_prodi()
    {
        return $this->hasOne('App\ProdiFinal', 'nim', 'nim');
    }
}
