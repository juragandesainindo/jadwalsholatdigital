<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KegiatanMasjidRequest extends FormRequest
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
            'nama_kegiatan' => 'required',
            'ustad' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_kegiatan.required' => 'Kegiatan wajib diisi!',
            'ustad.required' => 'Ustad wajib dipilih!',
            'tanggal.required' => 'Tanggal wajib dipilih!',
            'jam.required' => 'Jam wajib diisi!',
            'status.required' => 'Status wajib diisi!',
        ];
    }
}
