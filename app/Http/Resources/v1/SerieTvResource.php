<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SerieTvResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->getSerieTv();
    }


    // PROTECTED //
    protected function getSerieTv()
    {
        return [
            'ID' => $this->idSerieTv,
            'Categoria' => $this->idCategoria,
            'Genere' => $this->idGenere,
            'Titolo' => $this->titolo,
            'Trama' => $this->trama,
            'Stagioni' => $this->totStagioni,
            'Episodi' => $this->nEpisodi,
            'Regista' => $this->regista,
            'Attori' => $this->attori,
            'Anno di Uscita' => $this->annoInizio,
            'Anno di Fine' => $this->annoFine,
        ];
    }
}
