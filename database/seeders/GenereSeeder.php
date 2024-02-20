<?php

namespace Database\Seeders;

use App\Models\Genere;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genere::create([
            "nome"=>"Azione","sku"=>"azione","visualizzato"=>"1"]);
        Genere::create([
            "nome"=>"Avventura","sku"=>"avventura","visualizzato"=>"1"]);
        Genere::create([
            "nome"=>"Commedia","sku"=>"commedia","visualizzato"=>"1"]);
        Genere::create([
            "nome"=>"Drammatico","sku"=>"drammatico","visualizzato"=>"1"]);
        Genere::create([
            "nome"=>"Fantascienza","sku"=>"fantascienza","visualizzato"=>"1"]);
        Genere::create([
            "nome"=>"Fantasy","sku"=>"fantasy","visualizzato"=>"1"]);
        Genere::create([
            "nome"=>"Avventura","sku"=>"azione","visualizzato"=>"1"]);
        Genere::create([
            "nome"=>"Fantasy","sku"=>"azione","visualizzato"=>"1"]);
        Genere::create([
            "nome"=>"Horror","sku"=>"horror","visualizzato"=>"1"]);
        Genere::create([
            "nome"=>"Thriller","sku"=>"thriller","visualizzato"=>"0"]);
        Genere::create([
            "nome"=>"Mistero","sku"=>"mistero","visualizzato"=>"0"]);
        Genere::create([
            "nome"=>"Romantico","sku"=>"romantico","visualizzato"=>"0"]);
        Genere::create([
            "nome"=>"Crimine","sku"=>"crimine","visualizzato"=>"0"]);
        Genere::create([
            "nome"=>"Guerra","sku"=>"guerra","visualizzato"=>"0"]);
        Genere::create([
            "nome"=>"Storico","sku"=>"storico","visualizzato"=>"0"]);
        Genere::create([
            "nome"=>"Biografico","sku"=>"biografico","visualizzato"=>"0"]);
        Genere::create([
            "nome"=>"Animazione","sku"=>"animazione","visualizzato"=>"0"]);
        Genere::create([
            "nome"=>"Documentario","sku"=>"documentario","visualizzato"=>"0"]);
        Genere::create([
            "nome"=>"Musica","sku"=>"musica","visualizzato"=>"0"]);
        Genere::create([
            "nome"=>"Sportivo","sku"=>"sportivo","visualizzato"=>"0"]);
    }
}
