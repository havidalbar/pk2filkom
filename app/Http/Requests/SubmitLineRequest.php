<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitLineRequest extends FormRequest
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
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Data jawaban tidak valid',
            'string' => 'Data jawaban tidak valid',
            'size' => 'Data jawaban tidak valid',
            'array' => 'Data jawaban tidak valid',
            'image' => 'File yang diunggah harus berupa gambar',
            'jawaban.url.max' => 'Masukan harus tidak lebih dari :max karakter',
            'jawaban.screenshot.max' => 'File yang diunggah harus tidak lebih dari :max KB'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $penugasan = \App\Penugasan::where('slug', $this->route('slug'))
            ->withCount(['soal'])->get();
        return [
            'jawaban' => 'required|array|size:' . $penugasan->soal_count,
            'jawaban.id' => 'required|string|size:32',
            'jawaban.url' => 'required|string|max:191',
            'jawaban.screenshot' => 'required|image|max:4096'
        ];
    }
}
