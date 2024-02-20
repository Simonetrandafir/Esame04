<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieGenere extends Model
{
    use HasFactory;

    protected $table="categorie_genere";
    protected $primaryKey="id";

    protected $fillable=[
        'id',
        'idCategoria',
        'idGenere',
    ];
}
