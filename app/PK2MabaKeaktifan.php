<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PK2MabaKeaktifan extends Model
{
    use Traits\EditorTracker;

    protected $table = 'pk2maba_keaktifan';

    protected $primaryKey = 'nim';
    public $incrementing = false;

    protected $fillable = [
        'nim',
        'aktif_rangkaian1',
        'penerapan_nilai_rangkaian1',
        'aktif_rangkaian2',
        'penerapan_nilai_rangkaian2',
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
