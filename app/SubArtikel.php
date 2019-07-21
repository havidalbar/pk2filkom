<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubArtikel extends Model
{
    protected $table = 'sub_artikel';

    public function getThumbnailAttribute($value)
    {
        if (file_exists(public_path() . 'uploads/sub_artikel/' . $value)) {
            return asset('uploads/thumbnail/' . $value);
        } else {
            return asset('img/berita/empty.png');
        }
    }
}
