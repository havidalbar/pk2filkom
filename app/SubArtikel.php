<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubArtikel extends Model
{
    protected $table = 'sub_artikel';

    public function getThumbnailAttribute($value)
    {
        if (file_exists(public_path() . 'uploads/sub_artikel/') . $value) {
            return asset('uploads/sub_artikel/' . $value);
        } else {
            return 'https://dummyimage.com/200x200/000000/fff&text=+SUB_ARTIKEL';
        }
    }
}
