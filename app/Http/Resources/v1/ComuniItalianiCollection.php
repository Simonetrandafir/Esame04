<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ComuniItalianiCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->collection->toArray();
    }

    //---------------------PROTECTED--------------------------------------------------
    protected function getCampi($item) {
            // 'idComuneItalia',
            // 'nome',
            // 'regione',
            // 'metropolitana',
            // 'provincia',
            // 'siglaAuto',
            // 'codCatastale',
            // 'capoluogo',
            // 'multiCap',
            // 'cap',
            // 'capInizio',
            // 'capFine',
        return [
            'ID' => $item["idComuneItalia"],
            'Comune' => $item["nome"],
            'Regione' => $item["regione"],
            'Metropolitana' => $item["metropolitana"],
            'Provincia' => $item["provincia"],
            'Sigla Automobilistica' => $item["siglaAuto"],
            'Codice Catastale' => $item["codCatastale"],
            'Capoluogo' => $item["capoluogo"],
            'MultiCap' => $item["multiCap"],
            'CAP' => $item["cap"],
            'CAP Inizio' => $item["capInizio"],
            'CAP Fine' => $item["capFine"],
        ];
    }
}
