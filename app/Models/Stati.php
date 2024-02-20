<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stati extends Model
{
    use HasFactory,SoftDeletes;

    protected $table="stati";
    protected $primaryKey="idStato";

    protected $fillable=[
        'idStato',
        'stato',
    ];

    public function statoContatti(){
        return $this->hasMany(Contatti::class,'idStato', 'idStato')->orderBy('idStato','ASC');
    }
}
