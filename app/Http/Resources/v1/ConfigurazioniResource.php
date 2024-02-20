<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConfigurazioniResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->getConfig();
    }

    // PROTECTED //
    protected function getConfig()
    {
        return [
            "idConfigurazioni"=> $this->idConfigurazioni,
            "chiave"=> $this->chiave,
            "valore"=> $this->valore,
        ];
    }
}
