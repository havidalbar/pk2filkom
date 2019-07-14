<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitIGYTRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return session('nim');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'jawaban' => 'required|array',
            'jawaban.id' => 'required|string|min:32|max:32',
            'jawaban.url' => 'required|string|min:32|max:32'
        ];
    }
}
