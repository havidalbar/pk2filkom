<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class PenilaianBeta extends Model
{
    use Uuid;

    protected $table = 'penilaian_beta';

    protected $keyType = 'string';
    public $incrementing = false;
}
