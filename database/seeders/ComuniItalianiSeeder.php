<?php

namespace Database\Seeders;

use App\Models\ComuniItaliani;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComuniItalianiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = storage_path("app/csv_db/comuniItaliani.csv");
        $file =fopen($csv,"r");
        while(($data =fgetcsv($file,200,",")) !== false){
            ComuniItaliani::create([
                "idComuneItalia"=>$data[0],
                "nome" =>$data[1],
                "regione" =>$data[2],
                "metropolitana" =>$data[3],
                "provincia" =>$data[4],
                "siglaAuto" =>$data[5],
                "codCatastale" =>$data[6],
                "capoluogo" =>$data[7],
                "multiCap" =>$data[8],
                "cap" =>$data[9],
                "capInizio" =>$data[10],
                "capFine" =>$data[11]
            ]);
        }
    }
}
