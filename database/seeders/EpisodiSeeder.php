<?php

namespace Database\Seeders;

use App\Models\Episodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EpisodiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            Episodi::create([
                'idSerieTv' => $faker->numberBetween(1, 10),
                'titolo' => $faker->sentence(1),
                'trama' => $faker->paragraph(3),
                'stagione' => $faker->numberBetween(1, 5),
                'episodio' => $faker->numberBetween(5, 20),
                'durata' => $faker->numberBetween(30,120),
                'anno' => $faker->year(),
                'visualizzato' => $faker->numberBetween(0, 1),
            ]);
        }
    }
}
