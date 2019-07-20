<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PK2MabaAbsensi extends Model
{
    use Traits\EditorTracker;

    protected $table = 'pk2maba_absensi';

    protected $primaryKey = 'nim';
    public $incrementing = false;

    protected $fillable = [
        'nim',
        'nilai_rangkaian1',
        'nilai_rangkaian2',
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
