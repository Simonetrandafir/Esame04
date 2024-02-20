<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Genere;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\GenereStoreRequest;
use App\Http\Requests\v1\GenereUpdateRequest;
use App\Http\Resources\v1\GenereCollection;
use App\Http\Resources\v1\GenereCompletaCollection;
use App\Http\Resources\v1\GenereCompletaResource;
use App\Http\Resources\v1\GenereResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class GenereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $risorsa = null;
        if (Gate::allows('leggere')) {
            if (Gate::allows('admin')) {
                $risorsa = Genere::all();
                return $this->creaCollection($risorsa);
            } else {
                $risorsa = Genere::all()->where('visualizzato', 1);
                return new GenereCollection($risorsa);
            }
        }  else {
            abort(404, 'CG_0001');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GenereStoreRequest $request)
    {
        if (Gate::allows("creare")) {
            $data = $request->validated();
            $config = Genere::create($data);
            return new GenereCompletaResource($config);
        } else {
            abort(404,"CGS_0006");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($idGenere)
    {
        $genere = $this->trovaID($idGenere);
        if (Gate::allows('leggere')) {
            if (Gate::allows('admin')) {
                return $this->creaRisorsa($genere);
            } else {
                $genere = Genere::where('idGenere',$idGenere)
                ->where('visualizzato',1)->firstOrFail();
                return new GenereResource($genere);
            }
        }  else {
            abort(404, 'CG_0003');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GenereUpdateRequest $request, $idGenere)
    {
        if (Gate::allows('aggiornare')) {
            if (Gate::allows('admin')){
                $data = $request->validated();
                $genere = $this->trovaID($idGenere);
                $genere->fill($data);
                $genere->save();
                return new GenereCompletaResource($genere);
            }else {
                abort(403,'CGU_0004');
            }
        } else {
            abort(404,'CGU_0005');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idGenere)
    {
        if (Gate::allows('eliminare')){
            $genere = $this->trovaID($idGenere);
            $genere->deleteOrFail();
            $this->aggiornaIdTabella();
            return response()->noContent();
        }else{
            abort(404,'CGD_0006');
        }
    }

    // -----------------------------------------------------------------------------//
    //          *****   PROTECTED   *****           //
    protected function trovaID($id){
        $risorsa = Genere::findOrFail($id);
        if ($risorsa !== null){
            return $risorsa;
        }else{
            abort(404,'ID non trovato');
        }
    }
    protected function aggiornaIdTabella (){
        $maxId = Genere::max('idGenere');
        $statement = "ALTER TABLE genere AUTO_INCREMENT = $maxId";
        $query = DB::statement($statement);
        if ($query !== null){
            return $query;
        }else{
            abort(404,'GCDB_0001');
        }
    }
    protected function creaCollection($risorsa)
    {
        if ($risorsa !== null){
            $tipo = request("tipo");
            if ($tipo == "completo") {
                $risorsa = new GenereCompletaCollection($risorsa);
            } else {
                $risorsa = new GenereCollection($risorsa);
            }
    
            return $risorsa;
        }else{
            abort (404, 'CGF_0006');
        }
    }

    protected function creaRisorsa($genere)
    {
        if ($genere !== null){
            $tipo = request("tipo");
            if ($tipo == "completo") {
                return new GenereCompletaResource($genere);
            } else {
                return new GenereResource($genere);
            }

        }else{
            abort (404, 'CGF_0007');
        }
    }
}
