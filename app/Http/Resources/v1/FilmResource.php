<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->showGenere();
    }

        //---------------------PROTECTED---------------------------------------
        protected function showGenere(){
            return[
                'ID'=>$this->idFilm,
                'Titolo'=>$this->titolo,
                'Trama'=>$this->trama,
                'Durata'=>$this->durataMin,
                'Anno'=>$this->annoUscita,
                'Regista'=>$this->regista,
                'Attori'=>$this->attori,
            ];
        }
}
