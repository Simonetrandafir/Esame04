<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                CategorieSeeder::class,
                GenereSeeder::class,
                ComuniItalianiSeeder::class,
                NazioniSeeder::class,
                ConfigurazioniSeeder::class,
                RuoliSeeder::class,
                StatiSeeder::class,
                AbilitaSeeder::class,
                AbilitaRuoliSeeder::class,
                TipoIndirizziSeeder::class,
                ContattiSeeder::class,
                ContattiRuoliSeeder::class,
                CreditiSeeder::class,
                IndirizziSeeder::class,
                ContattiAuthSeeder::class,
                PasswordSeeder::class,
                SessioniSeeder::class,
                FilmSeeder::class,
                SerieTvSeeder::class,
                EpisodiSeeder::class,
            ]
        );
    }
}
