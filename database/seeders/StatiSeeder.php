<?php

namespace Database\Seeders;

use App\Models\Stati;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stati::create(["idStato"=>1,"stato"=>"attivo"]);
        Stati::create(["idStato"=>2,"stato"=>"disattivo"]);
        Stati::create(["idStato"=>3,"stato"=>"bannato"]);
        // Stati::create(["idStato"=>4,"stato"=>""]);
    }
}
