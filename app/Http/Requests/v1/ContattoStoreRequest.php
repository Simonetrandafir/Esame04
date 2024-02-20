<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class ContattoStoreRequest extends FormRequest
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
        if (!defined('REGOLA')){
            define('REGOLA', 'string|max:45');
        }
        return [
            "idStato" => "required|integer",
            "nome" => "required|string|max:45",
            "cognome" => "required|string|max:45",
            "sesso" => "integer",
            "codFiscale" =>REGOLA,
            "partitaIva" => REGOLA,
            "cittadinanza" => REGOLA,
            "idNazione" => REGOLA,
            "cittaNascita" => REGOLA,
            "provinciaNascita"=> REGOLA,
            "dataNascita"=> "string|max:255",
        ];
    }
}
