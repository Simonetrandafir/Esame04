<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContattiRuoli extends Model
{
    use HasFactory;

    protected $table="contatti_ruoli";
    protected $primaryKey="id";

    protected $fillable=[
        'id',
        'idContatto',
        'idRuolo',
    ];

    // public function ruoliContatti(){
    //     return $this->hasMany(Contatti::class,'idContatto', 'idContatto')->orderBy('idContatto','ASC');
    // }
    // public function ruoli(){
    //     return $this->hasMany(Ruoli::class,'idRuolo', 'idRuolo')->orderBy('idRuolo','ASC');
    // }
}
