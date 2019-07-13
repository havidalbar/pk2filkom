<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StartupAbsensi extends Model
{
    use Traits\EditorTracker;

    protected $table = 'startup_academy_absensi';

    protected $primaryKey = 'nim';
    public $incrementing = false;

    protected $fillable = [
        'nim',
        'nilai_rangkaian3',
        'nilai_rangkaian4',
        'nilai_rangkaian5',
    ];

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
