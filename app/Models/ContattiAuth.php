<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class ContattiAuth extends Model
{
    use HasFactory,SoftDeletes;

    protected $table="contatti_auths";
    protected $primaryKey="idAuth";

    protected $fillable=[
        'idContatto',
        'username',
        'email',
        'sfida',
        'secretJWT',
        'inizioSfida',
        'obbligoCambio',
    ];

    //-----------------PROTECTED------------------------------------------------------
    /**
     * Controllo se l'utente esiste per il log in
     * @param string $username
     * @return boolean
     */
    protected static function esisteUtenteValidoLog($username){
        $tmp = DB::table('contatti')->join('contatti_auths','contatti.idContatto','=','contatti_auths.idContatto')
        ->where('contatti.idStato','=',1)->where('contatti_auths.username','=',$username)
        ->select('contatti_auths.idContatto')->get()->count();
        return ($tmp > 0) ? true : false;
    }

    /**
     * Controlla se esiste l'utente
     * @param string $username
     * @return boolean
     */
    protected static function esisteUtente($username){
        $tmp = DB::table('contatti_auths')->where('contatti_auths.username','=', $username)
        ->select('contatti_auths.idContatto')->get()->count();
        return ($tmp > 0) ? true : false;
    }

    //---------------------RITORNO | APPARTENNENZA----------------------------------
    /**
     * Funzione di ritorno relazione|appartenenza
     */
    public function authContatti(){
        return $this->hasOne(Contatti::class,'idContatto', 'idContatto')->orderBy('idContatto', 'ASC');
    }
}
