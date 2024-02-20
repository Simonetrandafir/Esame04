<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Password extends Model
{
    use HasFactory,SoftDeletes;

    protected $table="passwords";
    protected $primaryKey="idPassword";

    protected $fillable=[
        'idContatto',
        'psw',
        'sale',
    ];

    //------------PUBLIC----------------------
    /**
     * Ritorna password auttuale per l'utente
     * @param integer $idUtente
     * @return \App\Models\Password
     */
    public static function passwordAttuale($idContatto){
        return Password::where('idContatto',$idContatto)->orderBy('idPassword','desc')->firstOrFail();
         
    }

    //---------------------RITORNO | APPARTENNENZA----------------------------------
    /**
     * Funzione di ritorno relazione|appartenenza
     */
    public function passwordContatti(){
        return $this->hasMany(Contatti::class,'idContatto', 'idContatto')
        ->orderBy("idContattoPassword", "desc")->firstOrFail();
    }
}
