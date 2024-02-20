<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Abilita extends Model
{
    use HasFactory,SoftDeletes;

    protected $table="abilita";
    protected $primaryKey="idAbilita";

    protected $fillable=[
        'idAbilita',
        'nome',
        'sku',
    ];
    

    public function ruoli(){
       return $this->belongsToMany(Ruoli::class, 'abilita_ruoli', 'idAbilita','idRuolo');
    }
}
