<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateSerialRequest extends FormRequest
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
            'season' => 'required|integer|max:100',
            'episode' => 'required|integer',
            'rating' => 'required|numeric',
            'genre' => 'required',
            'sinopsis' => 'required',
            'poster' => 'image',
            'cover' => 'image',
        ];
    }
}
