<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as classeGate;

class Ruoli extends classeGate
{
    use HasFactory,SoftDeletes;

    protected $table="ruoli";
    protected $primaryKey="idRuolo";

    protected $fillable=[
        'idRuolo',
        'ruolo',
    ];

    public function abilita(){
        return $this->belongsToMany(Abilita::class, 'abilita_ruoli', 'idRuolo','idAbilita');
    }

    public function contatti()
    {
        return $this->belongsToMany(Contatti::class, 'contatti_ruoli', 'idRuolo', 'idContatto');
    }
    //-------------------------------------------------------------------
    /**
     * Aggiungi abilita per il ruolo sulla tabella abilita_ruoli
     */
    public static function aggiungiRuoloAbilita($idRuolo,$idAbilita){
        $ruolo = Ruoli::where('idRuolo',$idRuolo)->firstOrFail();
        if (is_string($idAbilita)){
            $tmp = explode(',',$idAbilita);
        }else{
            $tmp = $idAbilita;
        }
        $ruolo->abilita()->attach($tmp);
        return $ruolo->abilita;
    }
}
