<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubArtikel extends Model
{
    protected $table = 'sub_artikel';

    protected $appends = [
        'thumbnail_src'
    ];

    public function getThumbnailSrcAttribute()
    {
        if (file_exists(public_path('uploads/sub_artikel/' . $this->thumbnail))) {
            return asset('uploads/sub_artikel/' . $this->thumbnail);
        } else {
            return asset('img/berita/empty.png');
        }
    }
}
