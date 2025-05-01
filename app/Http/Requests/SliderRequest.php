<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'image' => 'required|mimes:png,jpg,jpeg,mp4|max:1024',
            'status' => 'required',
            'order' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Image/Video wajib diisi!',
            'image.mimes' => 'Image/Video wajib extensi png, jpg, jpeg, atau mp4!',
            'image.max' => 'Size Image/Video maksimal 1 MB!',
            'status.required' => 'Status wajib diisi!',
        ];
    }
}
