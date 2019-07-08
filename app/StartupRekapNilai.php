<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StartupRekapNilai extends Model
{
    protected $table = 'startup_academy_rekap_nilai';
    	
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
