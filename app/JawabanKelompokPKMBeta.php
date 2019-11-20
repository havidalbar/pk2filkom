<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class JawabanKelompokPKMBeta extends Model
{
    use Uuid;

    protected $table = 'jawaban_kelompok_pkm_beta';

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id_kelompok',
        'id_soal'
    ];

    public function files()
    {
        return $this->hasMany('App\ProtectedFiles', 'id_jawaban', 'id');
    }

    public function soal()
    {
        return $this->belongsTo('App\PenugasanSoalBeta', 'id_soal', 'id');
    }

    public function kelompok()
    {
        return $this->belongsTo('App\KelompokPKM', 'id_kelompok', 'id');
    }
}
