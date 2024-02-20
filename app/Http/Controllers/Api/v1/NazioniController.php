<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Nazioni;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\NazioniCollection;
use App\Http\Resources\v1\NazioniCompletoCollection;

class NazioniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nome = request("nome");
        $continente = request("continente");
        $iso = request('iso');
        $nazioni = Nazioni::all();

        if ($nome !== null) {
            // Se è fornito un ID, visualizza la singola nazione
            $nazioniQuery = Nazioni::query();
            $nazioniQuery->where('nome', $nome);
            $nazioni = $nazioniQuery->get();
            
        } elseif ($continente !== null) {
            $nazioniQuery = Nazioni::query();
            $nazioniQuery->where('continente', $continente);
            $nazioni = $nazioniQuery->get();
           
        }elseif ($iso !== null) {
            $nazioniQuery = Nazioni::query();
            $nazioniQuery->where('iso', $iso);
            $nazioni = $nazioniQuery->get();
           
        }
        return $this->creaCollection($nazioni);
    }


    // -----------------------------------------------------------------------------//
    //          *****   PROTECTED   *****           //
    protected function creaCollection($nazioni)
    {
        $risorsa = null;
        $tipo = request("tipo");
        if ($tipo == "completo") {
            $risorsa = new NazioniCompletoCollection($nazioni);
        } else {
            $risorsa = new NazioniCollection($nazioni);
        }

        return $risorsa;
    }
}
