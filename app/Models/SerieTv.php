<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SerieTv extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'serie_tv';
    protected $primaryKey = 'idSerieTv';

    protected $fillable = [
        'idSerireTv',
        'idCategoria',
        'idGenere',
        'titolo',
        'trama',
        'totStagioni',
        'nEpisodi',
        'regista',
        'attori',
        'annoInizio',
        'annoFine',
        'visualizzato',
        'idFile',
        'idVideo',
    ];
}
