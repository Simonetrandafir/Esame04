<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ComuniItalianiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->showComuniItaliani();
    }

        //---------------------PROTECTED---------------------------------------
        protected function showComuniItaliani(){
            return [
                'ID'=>$this->idComuneItalia,
                'Comune'=>$this->nome,
                'Regione'=>$this->regione,
                'Metropolitana'=>$this->metropolitana,
                'Provincia'=>$this->provincia,
                'Sigla Automobilistica'=>$this->siglaAuto,
                'Codice Catastale'=>$this->codCatastale,
                'Capoluogo'=>$this->capoluogo,
                'MultiCap'=>$this->multiCap,
                'CAP'=>$this->cap,
                'CAP Inizio'=>$this->capInizio,
                'CAP Fine'=>$this->capFine,

            ];
        }
}
