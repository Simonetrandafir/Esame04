<?php

use App\Helpers\AppHelpers;
use App\Http\Controllers\Api\v1\AbilitaController;
use App\Http\Controllers\Api\v1\AccediController;
use App\Http\Controllers\Api\v1\CalcoloIva;
use App\Http\Controllers\Api\v1\CategorieController;
use App\Http\Controllers\Api\v1\ComuniItalianiController;
use App\Http\Controllers\Api\v1\ConfigurazioniController;
use App\Http\Controllers\Api\v1\ContattiController;
use App\Http\Controllers\Api\v1\EpisodiController;
use App\Http\Controllers\Api\v1\FilmController;
use App\Http\Controllers\Api\v1\GenereController;
use App\Http\Controllers\Api\v1\NazioniController;
use App\Http\Controllers\Api\v1\RuoliController;
use App\Http\Controllers\Api\v1\SerieTvController;
use App\Http\Controllers\Api\v1\StatiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//------------------------------------------COSTANTI------------------------------------------------
//VERSIONE -> costante = v1
if (!defined('VERSIONE')){
    define('VERSIONE','v1');
}
//AGGIORNA -> costante = v1
if (!defined('AGGIORNA')){
    define('AGGIORNA','/aggiorna');
}
//DISTRUGGI -> costante = v1
if (!defined('DISTRUGGI')){
    define('DISTRUGGI','/distruggi');
}
//CONTATTO_ID -> costante = v1
if (!defined('CONTATTO_ID')){
    define('CONTATTO_ID','/contatti/{idContatto}');
}
//CATEGORIA_ID -> costante = v1
if (!defined('CATEGORIA_ID')){
    define('CATEGORIA_ID','/categorie/{idCategoria}');
}
//FILM_ID -> costante = v1
if (!defined('FILM_ID')){
    define('FILM_ID','/films/{film}');
}
//GENERE_ID -> costante = v1
if (!defined('GENERE_ID')){
    define('GENERE_ID','/generi/{idGenere}');
}
//CONFIG_ID -> costante = v1
if (!defined('CONFIG_ID')){
    define('CONFIG_ID','/config/{idConfigurazione}');
}
//SERIE_ID -> costante = v1
if (!defined('SERIE_ID')){
    define('SERIE_ID','/serieTv/{idSerieTv}');
}
//EPISODI_ID -> costante = v1
if (!defined('EPISODI_ID')){
    define('EPISODI_ID','/episodi/{idEpisodio}');
}
//---------------------------------------------------- TEST ----------------------------------------------------
Route::get(VERSIONE . '/testLogin/admin', function () {
    $hashUser = "f2e1381bac73ef45020f38812fe2cb32d2e6538d0698e2198726e824258c65a0d5bad37f0cddc0f56b5b6249bfdf85ad3367d5bb7d2b8c0c32e6dbc773b21b88";
    $psw = "51dfe515a6ed9fff1e90c047925dd8c1fb1e1637c809633e554feb5a76d4e6a75db75562d51553fe264b545d65451f1f404b0930ee579ff13d08e89d6f57498e";
    //effettua login e insiresci qui sale
    $sale = "c30e63a50e21afdc34f0c05800af6efc89627f75aa802a054cad9e0c648a1c9cded063a57d4d6b7dd8e3f09d0e6c2c1716c24c7b4b5e61c5f0b9f73d242b234a";
    
    $hashSalePsw = AppHelpers::nascondiPassword($psw, $sale);
    
    AccediController::testLogin($hashUser, $hashSalePsw);
    /**TOOKEN :
     * eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwcy8vd3d3LmNvZGV4Lml0IiwiYXVkIjpudWxsLCJpYXQiOjE3MDgwNzkyMzksIm5iZiI6MTcwODA3OTIzOSwiZXhwIjoxNzA5Mzc1MjM5LCJkYXRhIjp7ImlkQ29udGF0dG8iOjEsImlkU3RhdG8iOjEsImlkUnVvbG8iOjEsImFiaWxpdGEiOlsxLDJdLCJub21lIjoiU2ltb25lVHJhbmRhZmlyIn19.-RJ-tS54EMsdG7asyU4_bmNsosMzVR1fLeuwL_qua5o
    */
});
Route::get(VERSIONE . '/testLogin/utente', function () {
    $hashUser = "f9ea35bdeab9c8a039682f0fd2a49f437e5503e100cef907d10f409555bf9b6ec55db861a52744f8fe417e672ae820f13213790bffa5f50b5f28885840ee40f2";
    $psw = "a06c15a9cbdc427e399a27efb407a8668130a034494cf462a2ef8571a57fe5b7385249954bb307789362fe18fa418b4a8bff87c7e9d1bc2e9d22d7b6c7b919e3";
    //effettua login e insiresci qui sale
    $sale = "2ec8e7d724f4df510f9d66218c532515f6501b81bbb1db4a487f7481d7030f845420d8a76bb315f6d9a550638eb80f1a5eed1878b9a23589c308a096398505e8";
    
    $hashSalePsw = AppHelpers::nascondiPassword($psw, $sale);
    
    AccediController::testLogin($hashUser, $hashSalePsw);
    /**TOOKEN :
     * eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwcy8vd3d3LmNvZGV4Lml0IiwiYXVkIjpudWxsLCJpYXQiOjE3MDgwNzkyOTYsIm5iZiI6MTcwODA3OTI5NiwiZXhwIjoxNzA5Mzc1Mjk2LCJkYXRhIjp7ImlkQ29udGF0dG8iOjIsImlkU3RhdG8iOjEsImlkUnVvbG8iOjIsImFiaWxpdGEiOlsxXSwibm9tZSI6IlBpbmNvUGFsbG8ifX0.pJ7NYkKwEl-DIP366PFv6N1UGXtpFnskxPdnfK7FzkU
    */
});


//---------------------------------------------------ENDPOINT---------------------------------------

//#################################################################################################################
Route::post(VERSIONE . '/registra', [ContattiController::class,'store']);
//#################################################################################################################

//-------------------------------------------------- ACCESSO : TUTTI -------------------------------------------------

//----------------------ACCEDI----------------------------------------------------tested
Route::get(VERSIONE . '/accedi/{utente}/{hash?}',[AccediController::class, 'accedi']);

//-----------COMUNI ITALIANI----------------------------------------tested
Route::get(VERSIONE . '/comuniItaliani', [ComuniItalianiController::class,'index']);

// --------------------- NAZIONI ------------------------------------tested
Route::get(VERSIONE . '/nazioni', [NazioniController::class,'index']);

//--------------ALTRO----------------------------------------------
Route::get(VERSIONE . '/calcoloIva/{numero}',[CalcoloIva::class,'calcolaIva']);

//#################################################################################################################

// ---------------------------------------- API ACCESSO : ADMIN, UTENTE -----------------------------------------------
Route::middleware(["autenticazione", "ruoli:admin,utente"])->group(function(){
    //-------------------CATEGORIE----------------------------------------tested
    Route::get(VERSIONE.'/categorie',[CategorieController::class, 'index']);
    Route::get(VERSIONE.CATEGORIA_ID,[CategorieController::class, 'show']);

    //------------------GENERE----------------------------------------------------------tested
    Route::get(VERSIONE . '/generi', [GenereController::class, 'index']);
    Route::get(VERSIONE . GENERE_ID, [GenereController::class, 'show']);
    
    // ------------------------- CONTATTO ---------------------------------------------tested
    Route::get(VERSIONE . CONTATTO_ID, [ContattiController::class,'show']);
    Route::put(VERSIONE . AGGIORNA . CONTATTO_ID, [ContattiController::class,'update']);

    // ------------------------- FILM -------------------------------------tested
    Route::get(VERSIONE . '/films', [FilmController::class,'index']);
    Route::get(VERSIONE . '/films/genere/{idGenere}', [FilmController::class,'indexGenere']);
    Route::get(VERSIONE . '/films/regista/{regista}', [FilmController::class,'indexRegista']);
    Route::get(VERSIONE . '/films/anno/{anno}', [FilmController::class,'indexAnno']);
    Route::get(VERSIONE . FILM_ID, [FilmController::class,'show']);

    // ------------------------- SERIE TV -------------------------------------tested
    Route::get(VERSIONE . '/serieTv', [SerieTvController::class,'index']);
    Route::get(VERSIONE . '/serieTv/genere/{idGenere}', [SerieTvController::class,'indexGenere']);
    Route::get(VERSIONE . '/serieTv/regista/{regista}', [SerieTvController::class,'indexRegista']);
    Route::get(VERSIONE . '/serieTv/anno/{anno}', [SerieTvController::class,'indexAnno']);
    Route::get(VERSIONE . SERIE_ID, [SerieTvController::class,'show']);

    // ------------------------- EPISODI -------------------------------------tested
    Route::get(VERSIONE . '/episodi/{idEpisodio}', [EpisodiController::class,'showEpisodio']);
    Route::get(VERSIONE . '/serieTv/{idSerieTv}/episodi', [EpisodiController::class,'episodiSerieTv']);

});

//#################################################################################################################

//--------------------------------------- API ACCESSO : ADMIN --------------------------------------------
Route::middleware(["autenticazione", "ruoli:admin"])->group(function(){
    
    //------------------------- CONTATTI ----------------------------------tested
    Route::get(VERSIONE . '/contatti', [ContattiController::class,'index']);
    Route::delete(VERSIONE .DISTRUGGI. CONTATTO_ID, [ContattiController::class,'destroy']);
    
    //------------------GENERE----------------------------------------------------------tested
    Route::post(VERSIONE . '/generi/salva',[GenereController::class, 'store']);
    Route::put(VERSIONE .AGGIORNA. GENERE_ID,[GenereController::class, 'update']);
    Route::delete(VERSIONE .DISTRUGGI. GENERE_ID,[GenereController::class, 'destroy']);
    
    //-------------------CATEGORIE----------------------------------------tested
    Route::post(VERSIONE.'/categorie/salva',[CategorieController::class, 'store']);
    Route::put(VERSIONE .AGGIORNA.CATEGORIA_ID,[CategorieController::class, 'update']);
    Route::delete(VERSIONE .DISTRUGGI. CATEGORIA_ID,[CategorieController::class, 'destroy']);
    
    // --------------------------- FILM --------------------------------------------tested
    Route::post(VERSIONE . '/films/salva', [FilmController::class,'store']);
    Route::put(VERSIONE . AGGIORNA . FILM_ID, [FilmController::class,'update']);
    Route::delete(VERSIONE . DISTRUGGI . FILM_ID, [FilmController::class,'destroy']);

    // ------------------------- SERIE TV -------------------------------------tested
    Route::post(VERSIONE . '/serieTv/salva', [SerieTvController::class,'store']);
    Route::put(VERSIONE . AGGIORNA . SERIE_ID, [SerieTvController::class,'update']);
    Route::delete(VERSIONE . DISTRUGGI . SERIE_ID, [SerieTvController::class,'destroy']);

    // ------------------------- EPISODI -------------------------------------tested
    Route::get(VERSIONE . '/episodi', [EpisodiController::class,'index']);
    Route::post(VERSIONE . '/episodi/salva', [EpisodiController::class,'store']);
    Route::put(VERSIONE .AGGIORNA. EPISODI_ID, [EpisodiController::class,'update']);
    Route::delete(VERSIONE .DISTRUGGI. EPISODI_ID, [EpisodiController::class,'destroy']);


    // ------------------------------------ CONFIGURAZIONI -----------------------------tested
    Route::get(VERSIONE . '/config', [ConfigurazioniController::class,'index']);
    Route::get(VERSIONE . CONFIG_ID, [ConfigurazioniController::class,'show']);
    Route::post(VERSIONE . '/config/salva',[ConfigurazioniController::class, 'store']);
    Route::put(VERSIONE .AGGIORNA. CONFIG_ID,[ConfigurazioniController::class, 'update']);
    Route::delete(VERSIONE .DISTRUGGI. CONFIG_ID,[ConfigurazioniController::class, 'destroy']);

    // ----------------------------------- RUOLI  -----------------------------------tested
    Route::get(VERSIONE . '/ruoli', [RuoliController::class,'index']);
    Route::get(VERSIONE . '/ruoli/{idRuolo}', [RuoliController::class,'show']);

    //------------------------------------ABILITA----------------------------------tested
    Route::get(VERSIONE . '/abilita',[AbilitaController::class, 'index']);
    Route::get(VERSIONE . '/abilita/{idAbilita}',[AbilitaController::class, 'show']);

    // --------------------------------------- STATI --------------------------------tested
    Route::get(VERSIONE . '/stati', [StatiController::class,'index']);
    Route::get(VERSIONE . '/stati/{idStato}', [StatiController::class,'show']);
});

//#################################################################################################################



