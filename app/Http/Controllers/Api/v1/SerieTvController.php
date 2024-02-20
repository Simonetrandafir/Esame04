<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\SerieTv;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\SerieTvStoreRequest;
use App\Http\Requests\v1\SerieTvUpdateRequest;
use App\Http\Resources\v1\SerieTvCollection;
use App\Http\Resources\v1\SerieTvCompletaCollection;
use App\Http\Resources\v1\SerieTvCompletaResource;
use App\Http\Resources\v1\SerieTvResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class SerieTvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serieTv = null;
        if (Gate::allows('leggere')) {
            if (Gate::allows('admin')) {
                $serieTv = SerieTv::all();
                return $this->creaCollection($serieTv);
            } else {
                $serieTv = SerieTv::where('visualizzato', 1)->get();
                return new SerieTvCollection($serieTv);
            }
        }  else {
            abort(403, 'STV_0001');
        }
    }

    public function indexGenere($idGenere){
        if (Gate::allows('leggere')) {
            if (Gate::allows('admin')) {
                $serieTv = SerieTv::where('idGenere',$idGenere)->get();
                return $this->creaCollection($serieTv);
            } else {
                $serieTv = SerieTv::where('visualizzato', 1)->where('idGenere',$idGenere)->get();
                return new SerieTvCollection($serieTv);
            }
        }  else {
            abort(403, 'STV_0000');
        }
    }

    public function indexRegista($regista){
        if (Gate::allows('leggere')) {
            if (Gate::allows('admin')) {
                $film = SerieTv::where('regista',$regista)->get();
                return $this->creaCollection($film);
            } else {
                $film = SerieTv::where('visualizzato', 1)->where('regista',$regista)->get();
                return new SerieTvCollection($film);
            }
        }  else {
            abort(403, 'STV_0010');
        }
    }

    public function indexAnno($anno){
        if (Gate::allows('leggere')) {
            if (Gate::allows('admin')) {
                $serieTv = SerieTv::where('annoInizio',$anno)->get();
                return $this->creaCollection($serieTv);
            } else {
                $serieTv = SerieTv::where('visualizzato', 1)->where('annoInizio',$anno)->get();
                return new SerieTvCollection($serieTv);
            }
        }  else {
            abort(403, 'STV_0011');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SerieTvStoreRequest $request)
    {
        if (Gate::allows("creare")) {
            $data = $request->validated();
            $config = SerieTv::create($data);
            return new SerieTvCompletaResource($config);
        } else {
            abort(403,"STV_0003");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $idSerieTv)
    {
        if (Gate::allows('leggere')) {
            if (Gate::allows('admin')) {
                $serieTv = $this->trovaID($idSerieTv);
                return $this->creaRisorsa($serieTv);
            } else{
                $serieTv = SerieTv::where('idSerieTv', $idSerieTv)
                ->where('visualizzato', 1)
                ->firstOrFail();
                return new SerieTvResource($serieTv);
            }
        } else {
            abort(403,'STV_0002');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SerieTvUpdateRequest $request, $idSerieTv)
    {
        if (Gate::allows('aggiornare')) {
            if (Gate::allows('admin')){
                $data = $request->validated();
                $serieTv = $this->trovaID($idSerieTv);
                $serieTv->fill($data);
                $serieTv->save();
                return new SerieTvCompletaResource($serieTv);
            }else {
                abort(403,'STV_0004');
            }
        } else {
            abort(404,'STV_0005');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idSerieTv)
    {
        if (Gate::allows('eliminare')) {
            $serieTv = $this->trovaID($idSerieTv);
            $serieTv->deleteOrFail();
            $this->aggiornaIdTabella();
            return response()->noContent();
        } else {
            abort (403, 'STV_0006');
        }
    }

    // -----------------------------------------------------------------------------//
    //          *****   PROTECTED   *****           //
    protected function trovaID($id){
        $risorsa = SerieTv::findOrFail($id);
        if ($risorsa !== null){
            return $risorsa;
        }else{
            abort(404,'ID non trovato');
        }
    }
    protected function aggiornaIdTabella (){
        $maxId = SerieTv::max('idSerieTv');
        $statement = "ALTER TABLE genere AUTO_INCREMENT = $maxId";
        $query = DB::statement($statement);
        if ($query !== null){
            return $query;
        }else{
            abort(404,'GCDB_0001');
        }
    }
    protected function creaCollection($serieTv)
    {
        if ($serieTv !== null){
            $tipo = request("tipo");
            if ($tipo == "completo") {
                $risorsa = new SerieTvCompletaCollection($serieTv);
            } else {
                $risorsa = new SerieTvCollection($serieTv);
            }
    
            return $risorsa;
        }else{
            abort (404, 'STVF_0006');
        }
    }
    protected function creaRisorsa($serieTv)
    {
        if ($serieTv !== null){
            $tipo = request("tipo");
            if ($tipo == "completo") {
                $risorsa = new SerieTvCompletaResource($serieTv);
            } else {
                $risorsa = new SerieTvResource($serieTv);
            }
    
            return $risorsa;

        }else{
            abort (404, 'STVF_0007');
        }
    }
}
