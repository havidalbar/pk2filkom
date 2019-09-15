<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $table = 'bidang';

    protected $appends = [
        'sisa_kuota'
    ];

    public function kelompok()
    {
        return $this->hasMany('App\KelompokPKM', 'bidang', 'bidang');
    }

    public function getSisaKuotaAttribute()
    {
        return $this->kuota - count($this->kelompok);
    }
}
