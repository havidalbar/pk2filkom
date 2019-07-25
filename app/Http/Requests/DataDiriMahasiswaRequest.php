<?php

namespace App\Http\Requests;

use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class DataDiriMahasiswaRequest extends FormRequest
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
            'required' => 'Kolom :attribute harus diisi',
            'string' => 'Kolom :attribute harus dalam bentuk tulisan',
            'max' => 'Kolom :attribute harus tidak lebih dari :max karakter',
            'date' => 'Kolom :attribute harus dalam bentuk tanggal',
            'before' => 'Kolom :attribute harus tidak melebihi tanggal saat ini',
            'in' => 'Kolom :attribute tidak valid',
            'min' => 'Kolom :attribute minimal berisi :min karakter',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tempat_lahir' => 'required|string|max:191',
            'tanggal_lahir' => 'required|date|before:now',
            'agama' => 'required|in:1,2,3,4,5,6,9',
            'gol_darah' => 'required|in:A,AB,B,O',
            'riwayat_penyakit' => 'required|string|max:65535',
            'alergi_makanan' => 'required|string|max:65535',
            'alergi_obat' => 'required|string|max:65535',
            'no_telepon' => [
                'required',
                new PhoneNumber,
                'min:5',
                'max:20',
            ],
        ];
    }
}
