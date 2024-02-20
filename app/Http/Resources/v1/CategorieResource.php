<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategorieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->showCategoria();
    }

        //---------------------PROTECTED---------------------------------------
        protected function showCategoria(){
            return [
                'ID'=>$this->idCategoria,
                'Categoria'=>$this->nome,
            ];
        }
}
