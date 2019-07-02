<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StartupPelanggaran extends Model
{
    use Traits\EditorTracker;

    protected $table = 'startup_academy_pelanggaran';

    protected $primaryKey = 'nim';
    public $incrementing = false;

    protected $fillable = [
        'ringan',
        'sedang',
        'berat',
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
