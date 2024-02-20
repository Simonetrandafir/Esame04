<?php

namespace Database\Seeders;

use App\Models\SerieTv;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SerieTvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            SerieTv::create([
                'idCategoria' => 2,
                'idGenere' => $faker->numberBetween(1, 20),
                'titolo' => $faker->sentence(1),
                'trama' => $faker->paragraph(3),
                'totStagioni' => $faker->numberBetween(1, 5),
                'nEpisodi' => $faker->numberBetween(5, 20),
                'regista' => $faker->name(),
                'attori' => $faker->sentence(3),
                'annoInizio' => $faker->year(),
                'annoFine' => $faker->year(),
                'visualizzato' => $faker->numberBetween(0, 1),
            ]);
        }
    }
}
