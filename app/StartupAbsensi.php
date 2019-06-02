<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StartupAbsensi extends Model
{
    protected $table = 'startup_academy_absensi';

    protected $primaryKey = 'nim';
    public $incrementing = false;

    protected $with = [
        'mahasiswa:nim,nama',
    ];

    protected $hidden = [
        'editor', 'created_at', 'updated_at',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa', 'nim', 'nim');
    }
}
