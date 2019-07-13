<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenugasanBeta extends Model
{
    protected $table = 'penugasan_beta';

    protected $hidden = [
        'editor', 'created_at', 'updated_at',
    ];

    public function soal()
    {
        return $this->hasMany('App\PenugasanSoalBeta', 'id_penugasan', 'id')->orderBy('index');
    }

    public function sluggable()
    {
        return [
            'source' => 'judul',
        ];
    }
}
