<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Accessi extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'accessi';
    protected $primaryKey = 'id';

    protected $fillable=[
        'idContatto',
        'autenticato',
        'ip',
    ];

    //-----------PUBLIC---------------------------

    /**
     * Aggiungi accesso per l'idUtente
     */
    public static function aggiungiAccesso($idContatto){
        Accessi::eliminaTentativi($idContatto);
        return Accessi::nuovoRecord($idContatto, 1);
    }

    /**
     * Aggiungi tentativo fallito all'idContatto
     */
    public static function aggiungiTentativoFallito($idContatto){
        return Accessi::nuovoRecord($idContatto, 0);
    }

    /**
     * Conta i tentativi per l'idContatto ci sono
     */
    public static function contaTentativi($idContatto) {
        return Accessi::where('idContatto',$idContatto)->where('autenticato',0)->count();
    }

    /**
     * Elimina tentativi per Utente
     */
    public static function eliminaTentativi($idContatto){
        $tentativi = Accessi::where('idContatto',$idContatto)->where('autenticato', 0)->get();
        // Iterazione sui tentativi trovati e cancellazione di ciascun record
        foreach ($tentativi as $tentativo) {
            $tentativo->delete(); // Eliminazione del tentativo fallito
        }
    }

    //---------------PROTECTED-----------------------------

    /**
     * Aggiungi record di tentativi
     */
    protected static function nuovoRecord($idContatto,$autenticato){
        return Accessi::create([
            'idContatto'=>$idContatto,
            'autenticato'=>$autenticato,
            'ip'=>request()->ip(),
        ]);
    }
}
