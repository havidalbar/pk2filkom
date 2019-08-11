<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitJawabanRequest extends FormRequest
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
            'jawaban.screenshot.max' => 'File yang diunggah harus tidak lebih dari :max KB',
            'in' => 'Pilihan Anda tidak valid',
            'abstraksi.min' => 'Abstraksi minimal terdiri dari :min karakter',
            'jawaban.screenshot.max' => 'Abstraksi maksimal terdiri dari :max karakter',
        ];
    }

    protected function prepareForValidation()
    {
        $penugasan = \App\PenugasanBeta::where('slug', $this->route('slug'))
            ->first(['jenis', 'slug']);
        $this->merge([
            'jenis' => $penugasan->jenis
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $penugasan = \App\PenugasanBeta::where('slug', $this->route('slug'))
            ->withCount(['soal'])->first();
        switch ($penugasan->jenis) {
            case 1:
            case 2:
                return [
                    'jawaban' => 'required|array|size:' . $penugasan->soal_count,
                    'jawaban.*.id' => 'required|string|size:36',
                    'jawaban.*.url' => 'required|string|max:191',
                ];
            case 3:
                return [
                    'jawaban' => 'required|array|size:' . $penugasan->soal_count,
                    'jawaban.*.id' => 'required|string|size:36',
                    'jawaban.*.url' => 'required|string|max:191',
                    'jawaban.*.screenshot' => 'required|image|max:4096'
                ];
            case 6:
                return [];
            case 7:
                return [
                    'bidang' => 'required|string|in:GFK,GT,K,KC,M,PE,PSH,T',
                    'abstraksi' => 'required|string|min:400|max:10000',
                ];
            default:
                return [
                    'jawaban.id' => 'required|string|size:36',
                    'jawaban.jawaban' => [
                        'required',
                        'string',
                        'size:36',
                        new \App\Rules\JawabanValid
                    ],
                ];
        }
    }
}
