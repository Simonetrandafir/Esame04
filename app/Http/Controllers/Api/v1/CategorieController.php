<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\v1\CategorieCollection;
use App\Http\Resources\v1\CategorieResource;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\CategorieStoreRequest;
use App\Http\Requests\v1\CategorieUpdateRequest;
use App\Http\Resources\v1\CategoriaCompletaCollection;
use App\Http\Resources\v1\CategoriaCompletaResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;


class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('leggere')) {
            if (Gate::allows('admin')) {
                $categorie = Categorie::all();
                return $this->creaCollection($categorie);
            } else {
                $categorie = Categorie::all()->where('visualizzato', 1);
                return new CategorieCollection($categorie);
            }
        }  else {
            abort(403, 'CC_0001');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategorieStoreRequest $request)
    {
        if (Gate::allows("creare")) {
            $data = $request->validated();
            $categorie = Categorie::create($data);
            return new CategoriaCompletaResource($categorie);
        } else {
            abort(403,"CC_0006");
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function show($idCategoria)
    {
        if (Gate::allows('leggere')) {
            if (Gate::allows('admin')) {
                $categorie = $this->trovaID($idCategoria);
                return $this->creaRisorsa($categorie);
            } else{
                $categoria = Categorie::where('idCategoria',$idCategoria)
                ->where('visualizzato', 1)->firstOrFail();
                return new CategorieResource($categoria);
            }
        } else {
            abort(403,'CC_0002');
        }
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(CategorieUpdateRequest $request, $idCategoria)
    {
        if (Gate::allows('aggiornare')) {
            if (Gate::allows('admin')){
                $data = $request->validated();
                $categorie = $this->trovaID($idCategoria);
                $categorie->fill($data);
                $categorie->save();
                return new CategoriaCompletaResource($categorie);
            }else {
                abort(403,'CC_0004');
            }
        } else {
            abort(403,'CC_0005');
        }
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idCategoria)
    {
        if (Gate::allows('eliminare')) {
            $categorie = $this->trovaID($idCategoria);
            $categorie->deleteOrFail();
            $this->aggiornaIdTabella();
            return response()->noContent();
        } else {
            abort (403, 'CC_0006');
        }
    }
    
    // -----------------------------------------------------------------------------//
    //          *****   PROTECTED   *****           //
    protected function trovaID($id){
        $risorsa = Categorie::findOrFail($id);
        if ($risorsa !== null){
            return $risorsa;
        }else{
            abort(404,'ID non trovato');
        }
    }
    protected function aggiornaIdTabella (){
        $maxId = Categorie::max('idCategoria');
        $statement = "ALTER TABLE genere AUTO_INCREMENT = $maxId";
        $query = DB::statement($statement);
        if ($query !== null){
            return $query;
        }else{
            abort(404,'GCDB_0001');
        }
    }
    protected function creaCollection($categorie)
    {
        if ($categorie !== null){
            $tipo = request("tipo");
            if ($tipo == "completo") {
                $categorie = new CategoriaCompletaCollection($categorie);
            } else {
                $categorie = new CategorieCollection($categorie);
            }
    
            return $categorie;
        }else{
            abort (404, 'CCF_0006');
        }
    }

    protected function creaRisorsa($categorie)
    {
        if ($categorie !== null){
            $tipo = request("tipo");
            if ($tipo == "completo") {
                $risorsa = new CategoriaCompletaResource($categorie);
            } else {
                $risorsa = new CategorieResource($categorie);
            }
    
            return $risorsa;

        }else{
            abort (404, 'CCF_0007');
        }
    }
}
