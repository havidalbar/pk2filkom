<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    protected $table = 'cluster';

    protected $primaryKey = 'nama';
    public $incrementing = false;

    protected $hidden = [
        'editor', 'created_at', 'updated_at',
    ];
}
