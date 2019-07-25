<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Optiik extends Model
{
    protected $table = 'optiik';
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
