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
}
