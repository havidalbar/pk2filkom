<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProtectedFile extends Model
{
    protected $table = 'protected_files';

    protected $primaryKey = 'path';
    protected $keyType = 'string';
    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'nim',
        'id_soal',
        'path'
    ];
}
