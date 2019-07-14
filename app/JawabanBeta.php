<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabanBeta extends Model
{
    protected $table = 'jawaban_beta';

    protected $fillable = [
        'nim',
        'id_penugasan',
        'id_soal'
    ];
}
