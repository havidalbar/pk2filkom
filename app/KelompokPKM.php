<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class KelompokPKM extends Model
{
    use Uuid;

    protected $table = 'kelompok_pkm';

    protected $keyType = 'string';
    public $incrementing = false;
    
    public function jawaban()
    {
        return $this->hasMany('App\JawabanKelompokPKMBeta', 'id_kelompok', 'id');
    }
}
