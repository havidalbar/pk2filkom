<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PenugasanBeta;

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
        'nilai_penugasan_full',
        'kelompok_pkm'
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
        return $this->hasOne('App\PK2MTourAbsensi', 'nim', 'nim');
    }

    public function pkm_keaktifan()
    {
        return $this->hasOne('App\PK2MTourKeaktifan', 'nim', 'nim');
    }

    public function pkm_pelanggaran()
    {
        return $this->hasOne('App\PK2MTourPelanggaran', 'nim', 'nim');
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

    public function jawaban()
    {
        return $this->hasMany('App\JawabanBeta', 'nim', 'nim');
    }

    public function nilai_penugasan()
    {
        return $this->hasMany('App\PenilaianBeta', 'nim', 'nim');
    }

    public function getNilaiPenugasanFullAttribute()
    {
        $penugasans = PenugasanBeta::withCount(['soal'])->get();
        $nilais = [];
        foreach ($penugasans as $penugasan) {
            if ($penugasan->jenis == 5) {
                continue;
            }

            $nilai['id_penugasan'] = $penugasan->id;
            $nilai['judul_penugasan'] = $penugasan->judul;

            switch ($penugasan->jenis) {
                case 4:
                    $jumlahJawabanBenar = 0;
                    foreach ($penugasan->soal as $soal) {
                        foreach ($this->jawaban as $jawaban) {
                            if ($jawaban->id_soal == $soal->id) {
                                $jawabanSoalIni = $jawaban;
                            }
                        }

                        if (isset($jawabanSoalIni) && $jawabanSoalIni->jawaban === $soal->id_jawaban_benar) {
                            $jumlahJawabanBenar++;
                        }

                        unset($jawabanSoalIni);
                    }

                    $nilai['nilai'] = $jumlahJawabanBenar / $penugasan->soal_count * 100;
                    break;
                case 6:
                    $jumlahJawabanBenar = 0;
                    foreach ($penugasan->soal as $soal) {
                        foreach ($this->jawaban as $jawaban) {
                            if ($jawaban->id_soal == $soal->id) {
                                $jawabanSoalIni = $jawaban;
                            }
                        }

                        if (isset($jawabanSoalIni) && strtoupper($jawabanSoalIni->jawaban) == strtoupper($soal->soal->jawaban)) {
                            $jumlahJawabanBenar++;
                        }

                        unset($jawabanSoalIni);
                    }

                    $nilai['nilai'] = $jumlahJawabanBenar / $penugasan->soal_count * 100;
                    break;
                default:
                    $nilai['nilai'] = 0;

                    foreach ($this->nilai_penugasan as $nilai_penugasan) {
                        if ($nilai_penugasan->id_penugasan == $penugasan->id) {
                            $nilai['nilai'] = $nilai_penugasan['nilai'];
                            break;
                        }
                    }
                    break;
            }
            $nilais[] = $nilai;
            unset($nilai);
        }
        return $nilais;
    }

    public function kelompok_pkm_ketua()
    {
        return $this->hasOne('App\KelompokPKM', 'nim_ketua', 'nim');
    }

    public function kelompok_pkm_anggota1()
    {
        return $this->hasOne('App\KelompokPKM', 'nim_anggota1', 'nim');
    }

    public function kelompok_pkm_anggota2()
    {
        return $this->hasOne('App\KelompokPKM', 'nim_anggota2', 'nim');
    }

    public function getKelompokPkmAttribute()
    {
        return $this->kelompok_pkm_ketua
            ?? $this->kelompok_pkm_anggota1
            ?? $this->kelompok_pkm_anggota2;
    }

    public function absensi_oh()
    {
        return $this->hasMany('App\AbsensiOH', 'nim', 'nim');
    }
}
