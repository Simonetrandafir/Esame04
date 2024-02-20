<?php

namespace Database\Seeders;

use App\Models\Contatti;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContattiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contatti::create(
            [
                'idStato'=>1,
                'nome'=>'Simone',
                'cognome'=>'Trandafir',
                'cittadinanza'=>'italiana',
                'idNazione'=>1,
            ]
        );
        Contatti::create(
            [
                'idStato'=>1,
                'nome'=>'Pinco',
                'cognome'=>'Pallo',
                'cittadinanza'=>'italiana',
                'idNazione'=>1,
            ]
        );
        Contatti::create(
            [
                'idStato'=>1,
                'nome'=>'test',
                'cognome'=>'test',
                'cittadinanza'=>'italiana',
                'idNazione'=>1,
            ]
        );
    }
}
