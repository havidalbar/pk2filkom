<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PK2MTourKeaktifan extends Model
{
    use Traits\EditorTracker;

    protected $table = 'pk2maba_tour_keaktifan';

    protected $primaryKey = 'nim';
    public $incrementing = false;

    protected $fillable = [
        'nim',
        'aktif_rangkaian6',
        'penerapan_nilai_rangkaian6',
        'aktif_rangkaian7',
        'penerapan_nilai_rangkaian7',
        'aktif_rangkaian8',
        'penerapan_nilai_rangkaian8',
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
