<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Robotiik extends Model
{
    protected $table = 'robotik';
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $hidden = [
        'editor', 'created_at', 'updated_at',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa', 'nim', 'nim');
    }
}
