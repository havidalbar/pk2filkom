<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class P2KMTourKeaktifan extends Model
{
    protected $table = 'pk2maba_tour_keaktifan';

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
