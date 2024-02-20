<?php

namespace Database\Seeders;

use App\Models\Ruoli;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ruoli::create(["idRuolo"=>1,"ruolo"=>"admin"]);
        Ruoli::create(["idRuolo"=>2,"ruolo"=>"utente"]);
        Ruoli::create(["idRuolo"=>3,"ruolo"=>"ospite"]);
        // Ruoli::create(["idRuolo"=>4,"ruolo"=>""]);
    }
}
