<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategorieCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        // $tmp = parent::toArray($request);
        // $tmp = array_map(array($this,'getCampi'),$tmp);
        return $this->collection->toArray();
    }

    //---------------------PROTECTED--------------------------------------------------
    protected function getCampi($item) {
        return [
            'ID' => $item["idCategoria"],
            'Categoria' => $item["nome"]
        ];
    }
}
