<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genere extends Model
{
    use HasFactory;

    protected $table = "genere";

    protected $primaryKey = "idGenere";

    protected $fillable = [
        "idGenere",
        "nome",
        "sku",
    ];
}
