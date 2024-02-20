<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class EpisodiStoreRequest extends FormRequest
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
        define('REGOLA','required|integer');
        return [
            'idSerieTv'=>REGOLA,
            'titolo'=>'required|string|max:45',
            'trama'=>'required|string',
            'stagione'=>REGOLA,
            'episodio'=>REGOLA,
            'durata'=>REGOLA,
            'anno'=>REGOLA,
            'visualizzato'=>'string|max:1',
            'idFile'=>'integer',
            'idVideo'=>'integer',
        ];
    }
}
