<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabanBeta extends Model
{
    protected $table = 'jawaban_beta';

    protected $fillable = [
        'nim',
        'id_penugasan',
        'id_soal'
    ];

    protected $appends = [
        'files'
    ];

    public function getFilesAttribute()
    {
        $files = \App\ProtectedFile::where([
            'nim', $this->nim,
            'id_soal', $this->id_soal
        ])->get();

        $file_urls = [];

        foreach ($files as $file) {
            $file_urls[] = route('protected-assets', $file->path);
        }

        return $file_urls;
    }
}
