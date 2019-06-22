<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentar';

    protected $with = [
        'balasan',
    ];

    public function balasan()
    {
        return $this->hasMany('App\Komentar', 'komentar_ke', 'id');
    }
}
