<?php

namespace App\Helpers;

use App\Models\Contatti;
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

class AppHelpers{

    //---------------------------------------PUBLIC-------------------------------
    /**
     * Toglie il required alle regole quando aggiorniamo i dati
     */
    public static function aggiornaRegoleHelpers($rules){

        $newRules = array();
        foreach ($rules as $key => $value) {
            $newRules[$key] = str_replace("required|", "", $value);
        }
        return $newRules;

    }

    /**
     * Unisci password e sale e fai HASH
     *
     * @param string $testo da decifrare
     * @param string $chiave usata per decifrare
     * @return string
     */
    public static function decifra($testoCifrato, $chiave)
    {
        $testoCifrato = base64_decode($testoCifrato);
        return AesCtr::decrypt($testoCifrato, $chiave, 256);
    }

    /**
     * Unisci password e sale e fai HASH
     *
     * @param string $testo da cifrare
     * @param string $chiave usata da cifrare
     * @return string
     */
    public static function cifra($testo, $chiave)
    {
        $testoCifrato = AesCtr::encrypt($testo, $chiave, 256);
        return base64_encode($testoCifrato);
    }

    /**
     * Estrae i nomi dei campi della tabella sul DB
     *
     * @param string $password
     * @param string $sale
     * @param string $sfida
     * @return array
     */
    public static function creaPasswordCifrata($password, $sale, $sfida)
    {
        $hashPasswordESale = AppHelpers::nascondiPassword($password, $sale,);
        return AppHelpers::cifra($hashPasswordESale, $sfida);

    }

    /**
     * Controlla amministratore
     */
    public static function isAdmin($idRuolo){
        return ($idRuolo == 1) ? true : false;
    }

    /**
     * Controlla utente e rispondi
     */
    public static function rispostaCustom($dati,$msg = null, $err = null){
        $response = array();
        $response['dati'] = $dati;
        if ($msg != null) {$response['message'] = $msg;}
        if ($err != null) {$response['error'] = $err;}
        return $response;
    }

    /**
     * Unisci psw e sale e fai l'hash
     */
    public static function nascondiPassword($psw,$sale){
        return hash('sha512',$sale . $psw);
    }

    /**
     * Creare Token Sessione
     */
    public static function creaTokenSessione($idContatto,$secretJWT,$usaDa = null, $scade = null){
        $maxTime = 15*24*60*60;//il token dura 15 giorni
        $recordUtente = Contatti::where('idContatto',$idContatto)->first();
        $tempo = time();
        $nbf = ($usaDa == null) ? $tempo : $usaDa;
        $exp = ($scade == null) ?$nbf + $maxTime : $scade;
        $ruolo = $recordUtente->ruoli[0];
        $idRuolo = $ruolo->idRuolo;
        $abilita = $ruolo->abilita->toArray();
        $abilita = array_map(function($arr){
            return $arr['idAbilita'];
        },$abilita);

        $arr = array(
            'iss'=>'https//www.codex.it',
            'aud'=>null,
            'iat'=>$tempo,
            'nbf'=>$nbf,
            'exp'=>$exp,
            'data'=> array(
                'idContatto'=>$idContatto,
                'idStato'=> $recordUtente->idStato,
                'idRuolo'=> $idRuolo,
                "abilita"=>$abilita,
                'nome'=>trim($recordUtente->nome . " " . $recordUtente->cognome)
            )
        );
        // Stampa i dati del token in console TEST TEST TEST
        echo "Dati del token:\n";
        print_r($arr);
        return JWT::encode($arr,$secretJWT, 'HS256');
        
    }
    /**
     * Valida Token
     */
    public static function validaToken($token, $secretJWT, $sessione){
        $rit = null;
        $payload = JWT::decode($token, new Key($secretJWT, 'HS256'));
        //echo ('VALIDA 1<br>');
        if ($payload->iat<=$sessione->inizioSessione){
            if ($payload->data->idContatto == $sessione->idContatto){
                $rit = $payload;
                //echo('VALIDA 2<br>');
            }
            return $rit;
        }
    }

}
