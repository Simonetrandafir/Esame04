<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sessioni', function (Blueprint $table) {
            //valori tabella
            $table->id('idSessione');
            $table->unsignedBigInteger('idContatto');
            $table->longText('token')->nullable();
            $table->unsignedInteger('inizioSessione')->default(0);

            //predefiniti Laravel
            $table->timestamps();
            
            //chiavi esterne
            $table->foreign("idContatto")->references("idContatto")->on("contatti");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessioni');
    }
};
