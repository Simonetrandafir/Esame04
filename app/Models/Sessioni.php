<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sessioni extends Model
{
    use HasFactory;

    protected $table="sessioni";
    protected $primaryKey="idSessione";

    protected $fillable=[
        'idContatto',
        'token',
        'inizioSessione',
    ];

    //------------PUBLIC------------------------------------

    /**
     * Aggiorna Sessione per l'utente
     */
    public static function aggiornaSessione($idContatto,$tk){
        $where = ['idContatto'=>$idContatto, 'token'=>$tk];
        $arr = ['inizioSessione' => time()];
        DB::table('sessioni')->updateOrInsert($where,$arr);
    }

    /**
     * Elimina Sessione per Utente
     */
    public static function eliminaSessione($idContatto){
        DB::table('sessioni')->where('idContatto',$idContatto)->delete();
    }

    /**
     * Dati sessione
     */
    public static function datiSessione($token){
        if (Sessioni::esisteSessione($token)){
            return Sessioni::where('token',$token)->get()->first();
        }else{
            return null;
        }
    }

    /**
     * Controlla se esiste sessione con token
     */
    public static function esisteSessione($token) {
        return DB::table('sessioni')->where('token',$token)->exists();
    }
}
