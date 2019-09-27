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
            'required' => 'Jawaban tidak valid',
            'string' => 'Jawaban tidak sesuai',
            'size' => 'Data jawaban tidak sesuai',
            'array' => 'Data jawaban tidak valid',
            'image' => 'File yang diunggah harus berupa gambar',
            'jawaban.*.url.max' => 'Masukan harus tidak lebih dari :max karakter',
            'in' => 'Pilihan Anda tidak valid',
            'abstraksi.min' => 'Abstraksi minimal terdiri dari :min karakter',
            'abstraksi.max' => 'Abstraksi maksimal terdiri dari :max karakter',
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
            case 3:
            case 9:
                return [
                    'jawaban' => 'required|array|size:' . $penugasan->soal_count,
                    'jawaban.*.id' => 'required|string|size:36',
                    'jawaban.*.url' => 'required|string|max:191',
                ];
            case 6:
                return [];
            case 7:
                return [
                    'bidang' => 'required|string|in:GFK,GT,K,KC,M,PE,PSH,T',
                    'abstraksi' => 'required|string|min:100|max:10000',
                ];
            case 8:
                return [
                    'nim_ketua' => 'required|size:15',
                    'nim_anggota1' => 'required|size:15',
                    'nim_anggota2' => 'required|size:15',
                    'bidang' => 'required|string|in:GFK,GT,K,KC,M,PE,PSH,T',
                    'abstraksi' => 'required|string|min:100|max:10000',
                ];
            default:
                return [];
        }
    }
}
