<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdiFinal extends Model
{
    use Traits\EditorTracker;

    protected $table = 'prodi_final';

    protected $primaryKey = 'nim';
    public $incrementing = false;

    protected $fillable = [
        'nim',
        'nilai_full',
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
