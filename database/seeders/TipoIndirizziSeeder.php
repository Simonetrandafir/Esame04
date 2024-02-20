<?php

namespace Database\Seeders;

use App\Models\TipoIndirizzi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoIndirizziSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoIndirizzi::create(["idTipoIndirizzo"=>1,"nome"=>"Residenza"]);
        TipoIndirizzi::create(["idTipoIndirizzo"=>2,"nome"=>"Domicilio"]);
        TipoIndirizzi::create(["idTipoIndirizzo"=>3,"nome"=>"IndirizzoSpedizioni"]);
        TipoIndirizzi::create(["idTipoIndirizzo"=>4,"nome"=>"Ufficio"]);
        TipoIndirizzi::create(["idTipoIndirizzo"=>5,"nome"=>"SedeLegale"]);
        TipoIndirizzi::create(["idTipoIndirizzo"=>6,"nome"=>"SedeOperativa"]);
    }
}
