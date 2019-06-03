<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pk2mRekapNilai extends Model
{
	protected $table = 'pk2maba_rekap_nilai';
	
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
