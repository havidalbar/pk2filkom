<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';

    protected $with = [
        'sub',
    ];

    protected $appends = [
        'thumbnail_src'
    ];

    public function getThumbnailSrcAttribute()
    {
        if (file_exists(public_path('uploads/thumbnail/' . $this->thumbnail))) {
            return asset('uploads/thumbnail/' . $this->thumbnail);
        } else {
            return asset('img/berita/empty.png');
        }
    }

    public function sub()
    {
        return $this->hasMany('App\SubArtikel', 'id_artikel', 'id');
    }

    public function komentar()
    {
        return $this->hasMany('App\Komentar', 'id_artikel', 'id')->orderBy('created_at');
    }
}
