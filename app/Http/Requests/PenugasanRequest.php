<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class PenugasanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Session::get('is_full_access');
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
            'jenis' => 'required|in:1,2',
            'random' => 'sometimes',
            'waktu_mulai' => 'required|date_format:Y-m-d H:i:s',
            'waktu_akhir' => 'required|date_format:Y-m-d H:i:s',
            'batas_waktu' => 'sometimes|required|integer|min:0|max:65535',
            'deskripsi' => 'required|string|max:65535',
            'soal' => 'required|array',
        ];
    }
}
