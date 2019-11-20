<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class AbsensiOH extends Model
{
    use Uuid;

    protected $table = 'absensi_oh';

    protected $keyType = 'string';
    public $incrementing = false;
}
