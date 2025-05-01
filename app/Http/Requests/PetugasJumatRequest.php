<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetugasJumatRequest extends FormRequest
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
            'tanggal' => 'required',
            'imam' => 'required',
            'khotib' => 'required',
            'muazin' => 'required',
            'judul' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tanggal.required' => 'Tanggal wajib diisi!',
            'imam.required' => 'Imam wajib diisi!',
            'khotib.required' => 'Khotib wajib diisi!',
            'muazin.required' => 'Muazin wajib diisi!',
            'judul.required' => 'Judul wajib diisi!',
            'status.required' => 'Status wajib diisi!',
        ];
    }
}
