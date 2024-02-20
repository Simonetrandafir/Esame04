<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NazioniResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return $this->getNazione();
    }


    // PROTECTED //
    protected function getNazione()
    {
        return [
            'ID' => $this->idNazione,
            'Nome' => $this->nome,
            'Continente' => $this->continente,
            'iso' => $this->iso,
            'iso3' => $this->iso3,
            'Prefisso' => $this->prefissoTel,
        ];
    }

}
