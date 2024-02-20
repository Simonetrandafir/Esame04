<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComuniItaliani extends Model
{
    use HasFactory;
    protected $table="comuni_italiani";
    protected $primaryKey="idComuneItalia";
    
    protected $fillable = [
        'idComuneItalia',
        'nome',
        'regione',
        'metropolitana',
        'provincia',
        'siglaAuto',
        'codCatastale',
        'capoluogo',
        'multiCap',
        'cap',
        'capInizio',
        'capFine',
    ];
}
