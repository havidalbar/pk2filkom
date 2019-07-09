<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PK2MTourAbsensi extends Model
{
    use Traits\EditorTracker;

    protected $table = 'pk2maba_tour_absensi';

    protected $primaryKey = 'nim';
    public $incrementing = false;

    protected $fillable = [
        'nilai_rangkaian6',
        'nilai_rangkaian7',
        'nilai_rangkaian8',
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
