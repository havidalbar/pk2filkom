<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Pengguna extends Model
{
    protected $table = 'pengguna';
    protected $fillable = [
        'username', 'password',
    ];

    protected $primaryKey = 'username';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = [
        'is_full_access',
    ];

    public function getIsFullAccessAttribute()
    {
        $access = ['BPI', 'PIT', 'SQC'];
        return in_array(Session::get('divisi'), $access);
    }
}
