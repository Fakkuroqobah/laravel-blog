<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestStore extends FormRequest
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
            'title' => 'required|max:20',
            'content' => 'required|max:300', 
            'thumbnail' => 'max:2000|mimes:jpeg,jpg,png,bmp'        
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judulnya Harus Di isi',
            'content.required' => 'Konten nya Harus Di isi',
            'title.max' => 'Maksimal panjang karakter 20',            
            'thumbnail.max' => 'maksimal ukuran file harus 2 MB',
            'thumbnail.mimes' => 'format harus jpg, jpeg, png, bmp'
        ];
    }
}
