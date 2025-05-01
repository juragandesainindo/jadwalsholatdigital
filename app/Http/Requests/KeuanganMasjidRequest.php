<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KeuanganMasjidRequest extends FormRequest
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
            'kategori_keuangan_id' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'jenis' => 'required',
            'nominal' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'kategori_keuangan_id.required' => 'Kategori wajib diisi!',
            'tanggal.required' => 'Tanggal wajib diisi!',
            'keterangan.required' => 'Keterangan wajib diisi!',
            'jenis.required' => 'Jenis wajib diisi!',
            'nominal.required' => 'Nominal wajib diisi!',
            'status.required' => 'Status wajib diisi!',
        ];
    }
}
