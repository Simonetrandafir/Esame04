<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Indirizzi extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "indirizzi";
    protected $primaryKey = "idIndirizzo";

    protected $fillable = [
        'idTipoIndirizzo',
        'idContatto',
        'idNazione',
        'idComuneItalia',
        'cap',
        'indirizzo',
        'civico',
        'citta',
        'lat',
        'lng',
        'altro_1',
        'altro_2',

    ];

    /** Funzione di ritorno relazione|appartenenza */
    public function tipoIndirizzo(){
        return $this->belongsTo(TipoIndirizzi::class,'idTipoIndirizzo', 'idTipoIndirizzo');
    }
    public function indirizziContatti(){
        return $this->hasMany(Contatti::class,'idContatto', 'idContatto');
    }
    public function indirizziComuni(){
        return $this->hasMany(Contatti::class,'idComuneItalia', 'idComuneItalia');
    }
}
