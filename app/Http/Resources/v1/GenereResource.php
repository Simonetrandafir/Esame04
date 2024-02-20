<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GenereResource extends JsonResource
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
                'idGenere'=>$this->idGenere,
                'nome'=>$this->nome,
                'sku'=>$this->sku,
            ];
        }

}
