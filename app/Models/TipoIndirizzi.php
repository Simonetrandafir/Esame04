<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoIndirizzi extends Model
{
    use HasFactory,SoftDeletes;

    protected $table="tipo_indirizzi";
    protected $primaryKey="idTipoIndirizzo";

    protected $fillable=[
        "idTipoIndirizzo",
        "nome",
    ];

        /** Funzione di ritorno relazione|appartenenza */
        public function indirizzi(){
            return $this->hasMany(Indirizzi::class,'idTipoIndirizzo', 'idTipoIndirizzo');
        }
}
