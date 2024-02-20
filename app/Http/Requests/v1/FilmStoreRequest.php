<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class FilmStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'idCategoria' => 'required|integer',
            'idGenere' => 'required|integer',
            'titolo' => 'required|string|max:45',
            'trama'=> 'required|string',
            'durataMin'=> 'required|string|max:20',
            'annoUscita'=> 'required|string|max:4',
            'regista'=> 'string|max:45',
            'attori'=> 'string|max:255',
            'visualizzato'=> 'string|max:1',
            'idFile'=> 'integer',
            'idVideo'=> 'integer',
        ];
    }
}
