<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontribusi extends Model
{
    protected $table = 'kontribusi_filkom';
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
