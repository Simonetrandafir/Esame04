<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RuoliResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return $this->getRuolo();
    }


    // PROTECTED //
    protected function getRuolo()
    {
        return [
            "ID"=> $this->idRuolo,
            "Ruolo"=> $this->ruolo,
        ];
    }
}
