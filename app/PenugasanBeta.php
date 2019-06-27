<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenugasanBeta extends Model
{
    protected $table = 'penugasan_beta';

    protected $hidden = [
        'editor', 'created_at', 'updated_at',
    ];
}
