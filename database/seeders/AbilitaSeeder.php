<?php

namespace Database\Seeders;

use App\Models\Abilita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbilitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Abilita::create(["idAbilita"=>1,"nome"=>"Leggere","sku"=>"leggere"]);
        Abilita::create(["idAbilita"=>2,"nome"=>"Creare","sku"=>"creare"]);
        Abilita::create(["idAbilita"=>3,"nome"=>"Aggiornare","sku"=>"aggiornare"]);
        Abilita::create(["idAbilita"=>4,"nome"=>"Eliminare","sku"=>"eliminare"]);
    }
}
