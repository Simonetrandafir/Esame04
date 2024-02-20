<?php

namespace Database\Seeders;

use App\Http\Controllers\Api\v1\AccediController;
use App\Models\ContattiAuth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContattiAuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $username = 'simonetrandafi@hotmail.it';
        ContattiAuth::create([
            'idContatto' => 1,
            'username' => AccediController::hash($username),
            'secretJWT' => '',
        ]);
        $username = 'pincopallo@email.it';
        ContattiAuth::create([
            'idContatto' => 2,
            'username' => AccediController::hash($username),
            'secretJWT' => '',
        ]);
        $username = 'test@email.it';
        ContattiAuth::create([
            'idContatto' => 3,
            'username' => AccediController::hash($username),
            'secretJWT' => '',
        ]);
    }
}
