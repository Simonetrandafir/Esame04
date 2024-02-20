<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Contatti;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\ContattoStoreRequest;
use App\Http\Requests\v1\ContattoUpdateRequest;
use App\Http\Resources\v1\ContattiCollection;
use App\Http\Resources\v1\ContattiCompletaCollection;
use App\Http\Resources\v1\ContattiCompletaResource;
use App\Http\Resources\v1\ContattiResource;
use App\Models\ContattiAuth;
use App\Models\Indirizzi;
use App\Models\Password;
use App\Models\Sessioni;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ContattiController extends Controller
{

    //--------------------------Funzioni Base--------------------------------
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('leggere')) {
            if (Gate::allows('admin')) {
                $risorsa = Contatti::all();
                return $this->creaCollection($risorsa);
            } else {
                abort(403, 'CC_0002: Utente non autorizzato');
            }
        } else {
            abort(404, 'CC_0001');
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ContattoStoreRequest $request)
    {
            $data = $request->validated();
            $contatto = Contatti::create($data);
            return new ContattiResource($contatto);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $idContatto)
    {
        $contatto = $this->trovaID($idContatto);

        if (Gate::allows('leggere')) {
            if (Gate::allows('admin')) {
                return $this->creaRisorsa($contatto);
            } else {
                //se la richiesta viene dall'utente prendo token
                $token = $request->bearerToken();
                if (!$token) { // Verifica se il token è presente nella richiesta
                    abort(403, 'TKM_0001');
                }else{
                    //controllo che l'idContatto corrisponda all'id nel token
                    $controllo = $this->controlloId($idContatto,$token);
                    if ($controllo === true){
                        return new ContattiResource($contatto);
                    }else{
                        abort(403,'TKM_0000');
                    }
                }
            }
        } else {
            abort(403, 'CCS_0004');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContattoUpdateRequest $request, $idContatto)
    {
        
        if (Gate::allows('aggiornare')) {
            $data = $request->validated();
            $contatto = $this->trovaID($idContatto);
            if (Gate::allows('admin')){
                $contatto->fill($data);
                $contatto->save();
                return new ContattiResource($contatto);
            }else{
                $token = $request->bearerToken();
                if (!$token) { // Verifica se il token è presente nella richiesta
                    abort(403, 'TKM_0002');
                }else{
                    //controllo che l'idContatto corrisponda all'id nel token
                    $controllo = $this->controlloId($idContatto,$token);
                    if ($controllo === true){
                        $contatto->fill($data);
                        $contatto->save();
                    }else{
                        abort(403,'TKM_0003');
                    }
                    return new ContattiResource($contatto);
                }
            }
        } else {
            abort(403, 'CC_0007');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idContatto)
    {
        if (Gate::allows('eliminare')) {
            $contatto = $this->trovaID($idContatto);
            $contatto->deleteOrFail();
            $this->aggiornaIdTabella();

            $password = Password::where('idContatto',$idContatto);
            $password->delete();

            $auth = ContattiAuth::where('idContatto',$idContatto)->firstOrFail();
            $auth->deleteOrFail();

            $indirizzi = Indirizzi::where('idContatto',$idContatto);
            $indirizzi->delete();

            $sessioni = Sessioni::where('idContatto',$idContatto);
            $sessioni->delete();

            return response()->noContent();
        } else {
            abort(403, 'CC_0008');
        }
    }

    // -----------------------------------------------------------------------------//
    //          *****   PROTECTED   *****           //
    protected function trovaID($id){
        $risorsa = Contatti::findOrFail($id);
        if ($risorsa !== null){
            return $risorsa;
        }else{
            abort(404,'ID non trovato');
        }
    }
    protected function aggiornaIdTabella (){
        $maxId = Contatti::max('idContatto');
        $statement = "ALTER TABLE genere AUTO_INCREMENT = $maxId";
        $query = DB::statement($statement);
        if ($query !== null){
            return $query;
        }else{
            abort(404,'CCDB_0001');
        }
    }
    protected function creaCollection($risorsa)
    {
        $tipo = request("tipo");
        if ($tipo == "completo") {
            $ritorno = new ContattiCompletaCollection($risorsa);
        } else {
            $ritorno = new ContattiCollection($risorsa);
        }

        return $ritorno;
    }

    protected function creaRisorsa($contatto)
    {
        if ($contatto !== null){
            $tipo = request("tipo");
            if ($tipo == "completo") {
                return new ContattiCompletaResource($contatto);
            } else {
                return new ContattiResource($contatto);
            }

        }else{
            abort (404, 'CGF_0007');
        }
    }
    protected function controlloId ($idContatto,$token){
        $payload = AccediController::verificaToken($token);
        if($payload !== null){
            $contattoDB = Contatti::where('idContatto', $payload->data->idContatto)->firstOrFail();
            if ($contattoDB->idContatto == $idContatto){
                return true;
            }else{
                abort(404, 'TKM_0003');
            }
        }else{
            abort(404, 'TKM_0002');
        }
    }
}
