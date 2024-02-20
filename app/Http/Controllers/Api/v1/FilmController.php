<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Film;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\FilmStoreRequest;
use App\Http\Requests\v1\FilmUpdateRequest;
use App\Http\Resources\v1\FilmCollection;
use App\Http\Resources\v1\FilmCompletoCollection;
use App\Http\Resources\v1\FilmCompletoResource;
use App\Http\Resources\v1\FilmResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $film = null;
        if (Gate::allows('leggere')) {
            if (Gate::allows('admin')) {
                $film = Film::all();
                return $this->creaCollection($film);
            } else {
                $film = Film::where('visualizzato', 1)->get();
                return new FilmCollection($film);
            }
        }  else {
            abort(403, 'FC_0001');
        }
    }
    public function indexGenere($idGenere){
        if (Gate::allows('leggere')) {
            if (Gate::allows('admin')) {
                $film = Film::where('idGenere',$idGenere)->get();
                return $this->creaCollection($film);
            } else {
                $film = Film::where('visualizzato', 1)->where('idGenere',$idGenere)->get();
                return new FilmCollection($film);
            }
        }  else {
            abort(403, 'FCI_0000');
        }
    }

    public function indexRegista($regista){
        if (Gate::allows('leggere')) {
            if (Gate::allows('admin')) {
                $film = Film::where('regista',$regista)->get();
                return $this->creaCollection($film);
            } else {
                $film = Film::where('visualizzato', 1)->where('regista',$regista)->get();
                return new FilmCollection($film);
            }
        }  else {
            abort(403, 'FCI_0010');
        }
    }

    public function indexAnno($anno){
        if (Gate::allows('leggere')) {
            if (Gate::allows('admin')) {
                $film = Film::where('annoUscita',$anno)->get();
                return $this->creaCollection($film);
            } else {
                $film = Film::where('visualizzato', 1)->where('annoUscita',$anno)->get();
                return new FilmCollection($film);
            }
        }  else {
            abort(403, 'FCI_0011');
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(FilmStoreRequest $request)
    {
        if (Gate::allows("creare")) {
            $data = $request->validated();
            $config = Film::create($data);
            return new FilmCompletoResource($config);
        } else {
            abort(403,"FCS_0003");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($idFilm)
    {
        if (Gate::allows('leggere')) {
            if (Gate::allows('admin')) {
                $film = $this->trovaID($idFilm);
                return $this->creaRisorsa($film);
            } else{
                $film = Film::where('idFilm', $idFilm)
                ->where('visualizzato', 1)
                ->firstOrFail();
                return new FilmResource($film);
            }
        } else {
            abort(403,'FC_0002');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FilmUpdateRequest $request, $idFilm)
    {
        if (Gate::allows('aggiornare')) {
            if (Gate::allows('admin')){
                $data = $request->validated();
                $film = $this->trovaID($idFilm);
                $film->fill($data);
                $film->save();
                return new FilmCompletoResource($film);
            }else {
                abort(403,'FCU_0004');
            }
        } else {
            abort(404,'FCU_0005');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idFilm)
    {
        if (Gate::allows('eliminare')) {
            $film = $this->trovaID($idFilm);
            $film->deleteOrFail();
            $this->aggiornaIdTabella();
            return response()->noContent();
        } else {
            abort (403, 'FCD_0006');
        }
    }

    // -----------------------------------------------------------------------------//
    //          *****   PROTECTED   *****           //
    protected function trovaID($id){
        $risorsa = Film::findOrFail($id);
        if ($risorsa !== null){
            return $risorsa;
        }else{
            abort(404,'ID non trovato');
        }
    }
    protected function aggiornaIdTabella (){
        $maxId = Film::max('idFilm');
        $statement = "ALTER TABLE genere AUTO_INCREMENT = $maxId";
        $query = DB::statement($statement);
        if ($query !== null){
            return $query;
        }else{
            abort(404,'FCDB_0001');
        }
    }
    protected function creaCollection($film)
    {
        if ($film !== null){
            $tipo = request("tipo");
            if ($tipo == "completo") {
                $risorsa = new FilmCompletoCollection($film);
            } else {
                $risorsa = new FilmCollection($film);
            }
    
            return $risorsa;
        }else{
            abort (404, 'FCF_0006');
        }
    }
    protected function creaRisorsa($film)
    {
        if ($film !== null){
            $tipo = request("tipo");
            if ($tipo == "completo") {
                $risorsa = new FilmCompletoResource($film);
            } else {
                $risorsa = new FilmResource($film);
            }
    
            return $risorsa;

        }else{
            abort (404, 'FCF_0007');
        }
    }
}
