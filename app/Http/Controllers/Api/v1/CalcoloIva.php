<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalcoloIva extends Controller
{
        /**
     * Calcolo iva
     */
    public static function calcolaIva($numero)
    {
        $iva = 22;
        $ris = $numero / 100* $iva;
        return array('data'=>$ris,'err'=>null,'message'=>null);
    }

}
