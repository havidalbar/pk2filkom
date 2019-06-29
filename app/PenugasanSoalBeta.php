<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class PenugasanSoalBeta extends Model
{
    use Uuid;

    protected $table = 'penugasan_soal_beta';

    public $incrementing = false;
    public $timestamps = false;

    protected $with = [
        'pilihan_jawaban',
    ];

    public function pilihan_jawaban()
    {
        return $this->hasMany('App\PenugasanJawabanBeta', 'id_soal', 'id');
    }
}
