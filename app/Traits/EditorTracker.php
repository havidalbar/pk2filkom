<?php
namespace App\Traits;

trait EditorTracker
{
    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            // Menyimpan username editor
            if (session('username')) {
                $model->editor = session('username');
            }
        });
    }
}
