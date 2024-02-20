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
        Schema::create('indirizzi', function (Blueprint $table) {
            $table->id('idIndirizzo');
            $table->unsignedBigInteger('idTipoIndirizzo')->index();
            $table->unsignedBigInteger('idContatto')->index();
            $table->unsignedBigInteger('idNazione');
            $table->unsignedBigInteger('idComuneItalia');
            $table->char('preferito', 1)->default(0);
            $table->unsignedBigInteger('cap')->index()->nullable();
            $table->string('indirizzo',255);
            $table->string('civico', 15);
            $table->string('citta',255);
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();
            $table->string('altro_1', 45)->nullable();
            $table->string('altro_2', 45)->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('idTipoIndirizzo')->references('idTipoIndirizzo')->on('tipo_indirizzi');
            $table->foreign('idNazione')->references('idNazione')->on('nazioni');
            $table->foreign('idComuneItalia')->references('idComuneItalia')->on('comuni_italiani');
            $table->foreign('cap')->references('cap')->on('comuni_italiani');
            $table->foreign('idContatto')->references('idContatto')->on('contatti');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indirizzi');
    }
};
