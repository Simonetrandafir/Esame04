<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\ComuniItaliani;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ComuniItalianiCollection;
use App\Http\Resources\v1\ComuniItalianiResource;
use Illuminate\Support\Facades\Gate;

class ComuniItalianiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comune = request('comune');
        $regione = request("regione");
        $metro = request("metropolitana");
        $comuniItaliani = ComuniItaliani::all();
        $ritorno = new ComuniItalianiCollection($comuniItaliani);
        if($comune !== null){
            $ritorno = $this->filtroComuni($comuniItaliani);

        } elseif ($regione !== null) {
            // Se è fornita la regione, visualizza il singolo Comune
            $comuniQuery = ComuniItaliani::query();
            $comuniQuery->where('regione', $regione);
            $comuni = $comuniQuery->get();
            $ritorno = new ComuniItalianiCollection($comuni);

        }elseif ($metro !== null){
            // Se è fornito un comune, visualizza il singolo Comune sennò tutti
            // Se è fornita la metropolitana, visualizza il singolo Comune
            $comuniQuery = ComuniItaliani::query();
            $comuniQuery->where('metropolitana', $metro);
            $comuni = $comuniQuery->get();
            $ritorno = new ComuniItalianiCollection($comuni);
        }elseif (request("tipo")=="completo"){
            $ritorno = $this->tabellaComuniCompleta($comuniItaliani);
        }
        return $ritorno;
    }


    /**
     * Display the specified resource.
     */
    public function show(ComuniItaliani $comuniItaliani)
    {
        //
    }


    //------------------------PROTECTED PERSONAL FUNCTION------------------------------------------------------

    //-----------------------------------------------------------------------------------------------------------
    protected function filtroComuni($comuniItaliani){
        if (request("comune")!= null){
            $comune = request("comune");
            return $this->filtra_per_Comune($comune);
        }else{
            return new ComuniItalianiCollection($comuniItaliani);
        }
    }
    //-----------------------------------------------------------------------------------------------------------
    protected function tabellaComuniCompleta($comuniItaliani){
        return $comuniItaliani
        ->chunk(15, function($comuniItaliani){
            echo "<table>";
            echo "<thead><tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Regione</th>
            <th>Metropolitana</th>
            <th>Provincia</th>
            <th>siglaAuto</th>
            <th>codCatastale</th>
            <th>capoluogo</th>
            <th>multiCap</th>
            <th>cap</th>
            <th>capInizio</th>
            <th>capFine</th>
            <th>created_at</th>
            <th>updated_at</th>
            </th></thead>
            <tbody>";
            foreach($comuniItaliani as $item){
                if (!defined('TD')){
                    define('TD','"<td>"');
                }
                if (!defined('TD_CLOSE')){
                    define('TD_CLOSE','"</td>"');
                }
                echo "<tr>".
                TD . $item->idComuneItalia .TD_CLOSE.
                TD . $item->nome . TD_CLOSE .
                TD . $item->regione . TD_CLOSE .
                TD . $item->metropolitana . TD_CLOSE .
                TD . $item->provincia . TD_CLOSE .
                TD . $item->siglaAuto . TD_CLOSE .
                TD . $item->codCatastale . TD_CLOSE .
                TD . $item->capoluogo . TD_CLOSE .
                TD . $item->multiCap . TD_CLOSE .
                TD . $item->cap . TD_CLOSE .
                TD . $item->capInizio . TD_CLOSE .
                TD . $item->capFine . TD_CLOSE .
                TD . $item->created_at . TD_CLOSE .
                TD . $item->updated_at . TD_CLOSE .
                "</tr>";
            }
            echo "</body></table>";
        });
    }
    //-----------------------------------------------------------------------------------------------------------
    protected function filtra_per_Comune ($comune){
        if ($comune != null){
            $valori = ['nome','regione','metropolitana','provincia',
                'siglaAuto','codCatastale','capoluogo','multiCap','cap','capInizio','capFine'];
            return ComuniItaliani::where('nome', $comune)->select($valori)->first();
        }
    }
}
