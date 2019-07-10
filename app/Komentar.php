<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use Uuid;

    protected $table = 'komentar';

    public $incrementing = false;

    protected $with = [
        'balasan',
    ];

    public function balasan()
    {
        return $this->hasMany('App\Komentar', 'komentar_ke', 'id');
    }

    public function pengirim_mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa', 'nim_mahasiswa', 'nim');
    }
}
