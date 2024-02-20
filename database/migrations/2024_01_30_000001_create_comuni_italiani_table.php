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
        Schema::create('comuni_italiani', function (Blueprint $table) {
            $table->id('idComuneItalia');
            $table->string('nome',45)->index();
            $table->string('regione',45);
            $table->string('metropolitana',45);
            $table->string('provincia',45);
            $table->char('siglaAuto',2);
            $table->char('codCatastale',4);
            $table->unsignedSmallInteger('capoluogo')->nullable();
            $table->unsignedSmallInteger('multiCap')->nullable();
            $table->unsignedBigInteger('cap')->index()->nullable();
            $table->unsignedInteger('capInizio')->nullable();
            $table->unsignedInteger('capFine')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comuni_italiani');
    }
};
