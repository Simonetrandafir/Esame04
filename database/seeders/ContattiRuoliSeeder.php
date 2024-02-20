<?php

namespace Database\Seeders;

use App\Models\ContattiRuoli;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContattiRuoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContattiRuoli::create(["idContatto"=>1,"idRuolo"=>1]);
        ContattiRuoli::create(["idContatto"=>2,"idRuolo"=>2]);
        ContattiRuoli::create(["idContatto"=>3,"idRuolo"=>2]);
        // ContattiRuoli::create(["id"=>3,"idContatto"=>3,"idRuolo"=>1]);
        // ContattiRuoli::create(["id"=>3,"idContatto"=>,"idRuolo"=>]);
    }
}
