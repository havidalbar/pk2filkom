<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class JawabanBeta extends Model
{
    use Uuid;

    protected $table = 'jawaban_beta';

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'nim',
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
}
