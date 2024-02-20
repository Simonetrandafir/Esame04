<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EpisodiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->getEpisodi();
    }

    // PROTECTED //
    protected function getEpisodi()
    {
        return [
            'ID' => $this->idEpisodio,
            'Serie Tv' => $this->idSerieTv,
            'Titolo' => $this->titolo,
            'Trama' => $this->trama,
            'Stagione' => $this->stagione,
            'Episodio' => $this->episodio,
            'Durata' => $this->durata,
            'Anno di Uscita' => $this->anno,
        ];
    }
}
