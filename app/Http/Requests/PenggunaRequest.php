<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class PenggunaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Session::get('divisi');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'sometimes|required|min:3|max:30|unique:pengguna,username',
			'password' => 'sometimes|required|min:4|max:20',
			'password_baru' => 'sometimes|required|min:4|max:20|confirmed',
            'divisi' => 'required_with:username|in:BPI,DDM,HUMAS,KESTARI,KOMKES,PENDAMPING,PIT,SQC,LEMBAGA,PERKAP',
        ];
    }
}
