<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Configurazioni;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\ConfigurazioniStoreRequest;
use App\Http\Requests\v1\ConfigurazioniUpdateRequest;
use App\Http\Resources\v1\ConfigurazioniCollection;
use App\Http\Resources\v1\ConfigurazioniResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ConfigurazioniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('leggere')) {
            if (Gate::allows('admin')) {
                return Configurazioni::all();
            } else {
                abort (403,'CC_0000 Non Autorizzato');
            }
        }  else {
            abort(404, 'CC_0001');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConfigurazioniStoreRequest $request)
    {
        if (Gate::allows("creare")) {
            $data = $request->validated();
            $config = Configurazioni::create($data);
            return new ConfigurazioniResource($config);
        } else {
            abort(403,"CCC_0006");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($idConfigurazione)
    {
        if (Gate::allows('leggere')) {
            if (Gate::allows('admin')) {
                // Trovo la configurazione con l'ID specifico:
                $configurazioni = $this->trovaID($idConfigurazione);
                if (!$configurazioni) {
                    // Gestisco il caso in cui la configurazione non esista
                    abort(404, 'CCC_0001');
                }

                return new ConfigurazioniResource($configurazioni);
            } else{
                abort(403, 'CCC_0001 Non Autorizzato');
            }
        } else {
            abort(404,'CC_0002');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConfigurazioniUpdateRequest $request, $idConfigurazione)
    {
        if (Gate::allows('aggiornare')) {
            if (Gate::allows('admin')){
                $data = $request->validated();
                $configurazioni = $this->trovaID($idConfigurazione);
                $configurazioni->fill($data);
                $configurazioni->save();
                return new ConfigurazioniResource($configurazioni);
            }else {
                abort(403,'CCC_0004');
            }
        } else {
            abort(403,'CCC_0005');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idConfigurazione)
    {
        if (Gate::allows('eliminare')) {
            $configurazione = $this->trovaID($idConfigurazione);
            $configurazione->deleteOrFail();
            $this->aggiornaIdTabella();
            return response()->noContent();
        } else {
            abort (403, 'CCC_0006');
        }
    }
    // -----------------------------------------------------------------------------//
    //          *****   PROTECTED   *****           //
    protected function trovaID($id){
        $risorsa = Configurazioni::findOrFail($id);
        if ($risorsa !== null){
            return $risorsa;
        }else{
            abort(404,'ID non trovato');
        }
    }
    protected function aggiornaIdTabella (){
        $maxId = Configurazioni::max('idConfigurazioni');
        $statement = "ALTER TABLE genere AUTO_INCREMENT = $maxId";
        $query = DB::statement($statement);
        if ($query !== null){
            return $query;
        }else{
            abort(404,'CCDB_0001');
        }
    }
}
