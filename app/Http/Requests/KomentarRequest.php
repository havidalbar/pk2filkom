<?php

namespace App\Http\Requests;

use App\Rules\ArtikelValid;
use App\Rules\KomentarValid;
use Illuminate\Foundation\Http\FormRequest;

class KomentarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'isi' => 'required|string|max:500',
            // 'komentar_ke' => [
            //     'sometimes',
            //     new ArtikelValid,
            //     new KomentarValid,
            // ],
        ];
    }
}
