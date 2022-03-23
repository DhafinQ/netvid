<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateFilmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'judul' => 'required',
            'tahun' => 'required',
            'durasi' => 'required|integer',
            'rating' => 'required|numeric',
            'genre' => 'required',
            'sinopsis' => 'required',
            'poster' => 'required|image',
            'cover' => 'required|image',
        ];
    }
}
