<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Film extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'film';
    protected $primaryKey = 'idFilm';
    
    protected $fillable = [
        'idFilm',
        'idCategoria',
        'idGenere',
        'titolo',
        'trama',
        'durataMin',
        'annoUscita',
        'regista',
        'attori',

    ];
}
