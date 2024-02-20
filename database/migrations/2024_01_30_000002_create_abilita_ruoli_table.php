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
        Schema::create('abilita_ruoli', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('idAbilita');
            $table->unsignedBigInteger('idRuolo');
            
            $table->timestamps();

            $table->foreign("idAbilita")->references("idAbilita")->on("abilita");
            $table->foreign("idRuolo")->references("idRuolo")->on("ruoli");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abilita_ruoli');
    }
};
