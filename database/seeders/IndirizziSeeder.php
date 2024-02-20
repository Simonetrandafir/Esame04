<?php

namespace Database\Seeders;

use App\Models\Indirizzi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndirizziSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Indirizzi::create(
            [
                'idTipoIndirizzo' => 1,
                'idContatto' => 1,
                'idNazione' => 1,
                'idComuneItalia' => 6171,
                'cap' => 83020,
                'indirizzo' => 'Via armando diaz',
                'civico' => '8/b',
                'citta' => 'Capua',
            ]
        );
        Indirizzi::create(
            [
                'idTipoIndirizzo' => 2,
                'idContatto' => 2,
                'idNazione' => 1,
                'idComuneItalia' => 6393,
                'cap' => 84087,
                'indirizzo' => 'Via vento a mare',
                'civico' => '16',
                'citta' => 'Sarno',
            ]
        );
        Indirizzi::create(
            [
                'idTipoIndirizzo' => 3,
                'idContatto' => 3,
                'idNazione' => 1,
                'idComuneItalia' => 6049,
                'cap' => 80011,
                'indirizzo' => 'Via narcotraffico',
                'civico' => '66',
                'citta' => 'Acerra',
            ]
        );
    }
}
