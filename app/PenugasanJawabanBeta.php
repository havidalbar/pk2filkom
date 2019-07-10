<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class PenugasanJawabanBeta extends Model
{
    use Uuid;

    protected $table = 'penugasan_jawaban_beta';

    public $incrementing = false;
    public $timestamps = false;
}
