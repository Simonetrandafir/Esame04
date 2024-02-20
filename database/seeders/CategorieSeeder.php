<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categorie::create([
            "idCategoria"=>1,"nome"=>"Film","sku"=>"film","visualizzato"=>"1"]);
        Categorie::create([
            "idCategoria"=>2,"nome"=>"SerieTv","sku"=>"serieTv","visualizzato"=>"1"]);
    }
}
