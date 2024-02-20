<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nazioni extends Model
{
    use HasFactory;

    protected $table="nazioni";
    protected $primaryKey="idNazione";
    protected $fillable = [
        'idNazione',
        'nome',
        'continente',
        'iso',
        'iso3',
        'prefissoTel'
    ];
}
