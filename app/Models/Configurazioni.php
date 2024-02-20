<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Configurazioni extends Model
{
    use HasFactory,SoftDeletes;

    protected $table="configurazioni";
    protected $primaryKey="idConfigurazioni";
    
    protected $fillable = [
        'idConfigurazioni',
        'chiave',
        'valore',
    ];

    //----------------------FUNZIONI PERSONALI------------------------------------------

    //-----------------------PUBLIC--------------------------------------------------
    protected static function leggiValori($chiave)
    {
        $configurazioni = self::where('chiave', $chiave)->first();
        // Recupera tutte le configurazioni dal database


        if ($configurazioni != null) {
            return $configurazioni->valore;
        }else{
            return null;

        }

    }
}
