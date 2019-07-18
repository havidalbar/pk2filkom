<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use function GuzzleHttp\json_decode;

class PenugasanBeta extends Model
{
    protected $table = 'penugasan_beta';

    protected $hidden = [
        'editor', 'created_at', 'updated_at',
    ];

    protected $appends = [
        'jenis_text'
    ];

    public function soal()
    {
        return $this->hasMany('App\PenugasanSoalBeta', 'id_penugasan', 'id')->orderBy('index');
    }

    public function getJenisTextAttribute()
    {
        switch ($this->jenis) {
            case 1:
                return 'Instagram';
            case 2:
                return 'Youtube';
            case 3:
                return 'LINE';
            case 4:
                return 'Pilihan Ganda';
            case 5:
                return 'Offline';
            case 6:
                return 'Teka-Teki Silang';
        }
    }

    public function getSoalAttribute($value)
    {
        if ($this->jenis == 6) {
            return json_decode($value);
        } else {
            return $value;
        }
    }
}
