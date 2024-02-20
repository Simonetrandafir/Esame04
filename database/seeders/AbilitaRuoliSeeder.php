<?php

namespace Database\Seeders;

use App\Models\AbilitaRuoli;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbilitaRuoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AbilitaRuoli::create(["id"=>1,"idAbilita"=>1,"idRuolo"=>1]);
        AbilitaRuoli::create(["id"=>2,"idAbilita"=>2,"idRuolo"=>1]);
        AbilitaRuoli::create(["id"=>3,"idAbilita"=>3,"idRuolo"=>1]);
        AbilitaRuoli::create(["id"=>4,"idAbilita"=>4,"idRuolo"=>1]);
        AbilitaRuoli::create(["id"=>5,"idAbilita"=>1,"idRuolo"=>2]);
        AbilitaRuoli::create(["id"=>6,"idAbilita"=>3,"idRuolo"=>2]);
        // AbilitaRuoli::create(["id"=>7,"idAbilita"=>,"idRuolo"=>]);
    }
}
