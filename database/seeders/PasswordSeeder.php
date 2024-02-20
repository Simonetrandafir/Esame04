<?php

namespace Database\Seeders;

use App\Http\Controllers\Api\v1\AccediController;
use App\Models\Password;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $psw1 = '123Admin';
        Password::create([
            'idContatto' => 1,
            'psw' => AccediController::hash($psw1),
            'sale' => ''
        ]);
        $psw2 = '123Utente';
        Password::create([
            'idContatto' => 2,
            'psw' => AccediController::hash($psw2),
            'sale' => ''
        ]);
        $psw3 = '123Test';
        Password::create([
            'idContatto' => 3,
            'psw' => AccediController::hash($psw3),
            'sale' => ''
        ]);
    }
}
