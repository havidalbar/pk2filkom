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
        'id_jawaban',
        'path'
    ];

    public function getLinkAttribute()
    {
        return route('protected-assets', ['name' => $this->path]);
    }

    public function jawaban()
    {
        return $this->belongsTo('App\JawabanBeta', 'id_jawaban', 'id');
    }
}
