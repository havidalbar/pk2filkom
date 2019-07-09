<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StartupKeaktifan extends Model
{
    use Traits\EditorTracker;

    protected $table = 'startup_academy_keaktifan';

    protected $primaryKey = 'nim';
    public $incrementing = false;

    protected $fillable = [
        'aktif_rangkaian3',
        'penerapan_nilai_rangkaian3',
        'aktif_rangkaian4',
        'penerapan_nilai_rangkaian4',
        'aktif_rangkaian5',
        'penerapan_nilai_rangkaian5',
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
