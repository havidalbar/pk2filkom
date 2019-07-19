<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use function GuzzleHttp\json_decode;

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
        return $this->hasMany('App\PenugasanJawabanBeta', 'id_soal', 'id')->orderBy('index');
    }

    public function penugasan()
    {
        return $this->belongsTo('App\PenugasanBeta', 'id_penugasan', 'id');
    }

    public function getSoalAttribute($value)
    {
        if ($this->penugasan->jenis == 6) {
            return json_decode($value);
        } else {
            return $value;
        }
    }
}
