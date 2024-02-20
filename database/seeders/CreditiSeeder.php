<?php

namespace Database\Seeders;

use App\Models\Crediti;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreditiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Crediti::create(["idContatto"=>1,"credito"=>"3000"]);
        Crediti::create(["idContatto"=>2,"credito"=>"5"]);
        Crediti::create(["idContatto"=>3]);
    }
}
