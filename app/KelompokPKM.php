<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class KelompokPKM extends Model
{
    use Uuid;

    protected $table = 'kelompok_pkm';

    protected $keyType = 'string';
    public $incrementing = false;

    public function jawaban()
    {
        return $this->hasMany('App\JawabanKelompokPKMBeta', 'id_kelompok', 'id');
    }

    public function ketua()
    {
        return $this->belongsTo('App\Mahasiswa', 'nim_ketua', 'nim');
    }

    public function anggota1()
    {
        return $this->belongsTo('App\Mahasiswa', 'nim_anggota1', 'nim');
    }

    public function anggota2()
    {
        return $this->belongsTo('App\Mahasiswa', 'nim_anggota2', 'nim');
    }
}
