<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Contatti extends Authenticatable
{
    use HasFactory,SoftDeletes;

    protected $table="contatti";
    protected $primaryKey="idContatto";
    protected $with=['indirizzi','auth','abilita','ruoli','crediti'];

    protected $fillable=[

        'idStato',
        'nome',
        'cognome',
        'sesso',
        'codFiscale',
        'partitaIva',
        'cittadinanza',
        'idNazione',
        'cittaNascita',
        'provinciaNascita',
        'dataNascita',
    ];

    //---------------------FUNZIONI PERSONALI---------------------------

    //-----------------------PUBLIC-------------------------------------

    /**
     * Aggiungi ruoli per l'utente sulla tabella utenti_utentiRuolo
     */
    public static function aggiungiUtenteRuolo($idContatto, $idRuolo){
        $utente = Contatti::where('idContatto',$idContatto)->firstOrFail();
        if (is_string($idRuolo)){
            $tmp = explode(',',$idRuolo);
        }else{
            $tmp = $idRuolo;
        }
        $utente->ruoli()->attach($tmp);
        return $utente->ruoli;
    }

    /**
     * Elimina i ruoli per il utenti sulla tabella utenti_utentiRuoli
     */
    public static function eliminaUtenteRuolo($idContatto,$idRuolo){
        $utente = Contatti::where('idContatto',$idContatto)->firstOrFail();
        if (is_string($idRuolo)){
            $tmp = explode(',',$idRuolo);
        }else{
            $tmp = $idRuolo;
        }
        $utente->ruoli()->detach($tmp);
        return $utente->ruoli;
    }

    /**
     * Sincronizza i ruoli per il contatto sulla tabella contatti_contattiRuoli
     *
     * @param integer $idContattoAuth
     * @param string|array $idRuoli
     * @return Collection
     */
    public static function sincronizzaContattoRuoli($idAuth, $idRuoli)
    {
        $contatto = ContattiAuth::where("idAuth", $idAuth)->firstOrFail();
        if (is_string($idRuoli)) {
            $tmp = explode(',', $idRuoli);
        } else {
            $tmp = $idRuoli;
        }
        
        // Utilizzo il metodo sync per sincronizzare i ruoli
        $contatto->ruoli()->sync($tmp);
        // Rirotno la collezione di ruoli sincronizzati con il contatto
        return $contatto->ruoli;



    }

    //---------------------RITORNO | APPARTENNENZA----------------------------------
    /**
     * Funzione di ritorno relazione|appartenenza
     */
    public function stato(){
        return $this->belongsToMany(Stati::class,'idStato', 'idStato')->orderBy('idStato', 'DESC');
    }
    public function ruoli(){
        return $this->belongsToMany(Ruoli::class,'contatti_ruoli', 'idContatto', 'idRuolo');
    }
    public function abilita(){
        return $this->belongsToMany(Abilita::class,'abilita_ruoli', 'idAbilita', 'idRuolo');
    }
    public function password(){
        return $this->hasMany(Password::class, 'idContatto', 'idContatto')->orderBy('idContatto', 'ASC');
    }
    public function auth(){
        return $this->hasOne(ContattiAuth::class,'idContatto', 'idContatto')->orderBy('idContatto', 'ASC');
    }
    public function indirizzi()
    {
        return $this->hasMany(Indirizzi::class, "idContatto", "idContatto")->orderBy("preferito", "DESC");
    }
    public function crediti(){
        return $this->hasOne(Crediti::class, 'idContatto','idContatto');
    }

}
