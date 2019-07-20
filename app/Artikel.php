<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';

    protected $with = [
        'sub',
    ];

    public function getThumbnailAttribute($value)
    {
        // if (file_exists(public_path() . 'uploads/thumbnail/') . $value) {
        //     return asset('uploads/thumbnail/' . $value);
        // } else {
            return 'https://dummyimage.com/200x200/000000/fff&text=+ARTIKEL';
        // }
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
