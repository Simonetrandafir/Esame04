<?php

namespace App\Http\Middleware\v1;

use App\Http\Controllers\Api\v1\AccediController;
use App\Models\Contatti;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AutenticazioneMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //----------------FILTRI E CONDIZIONI---------------------
        $token = null;
        if (isset($_SERVER['HTTP_AUTHORIZATION']) && $_SERVER['HTTP_AUTHORIZATION'] !== null) {
            // non funziona su Apache ma su Artisan si
            $token = $_SERVER['HTTP_AUTHORIZATION'];
            $token = trim(str_replace("Bearer", "", $token));
        } elseif (isset($_SERVER['PHP_AUTH_PW']) && $_SERVER['PHP_AUTH_PW'] !== null) {
            // usare con il server Apache
            $token = $_SERVER['PHP_AUTH_PW'];
        }
        $payload = AccediController::VerificaToken($token);
        if ($payload != null) {
            $contatto = Contatti::where('idContatto', $payload->data->idContatto)->firstOrFail();
            if ($contatto->idStato == 1){
                Auth::login($contatto);
                $request["ruoli"] = $contatto->ruoli->pluck('ruolo')->toArray();
                // $request->merge(['ruoli' => $contatto->ruoli->pluck('ruolo')->toArray()]);
                return $next($request);
            }else{
                abort(403,'TK_0002');
            }
        }else {
            abort(403, 'TK_0001');
        }
    }
}
