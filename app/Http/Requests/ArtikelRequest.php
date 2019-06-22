<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class ArtikelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Session::get('is_full_access') || (Session::get('divisi') == 'HUMAS');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'judul' => 'required|string|max:191',
            // 'deskripsi' => 'required|string|max:65535',
            'sub_konten' => 'required',
            'thumbnail' => 'image',
        ];
    }
}
