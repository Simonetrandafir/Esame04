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
        Schema::create('episodi', function (Blueprint $table) {
            $table->id('idEpisodio');
            $table->unsignedBigInteger('idSerieTv');
            $table->string('titolo',45);
            $table->longText('trama');
            $table->unsignedTinyInteger('stagione');
            $table->unsignedSmallInteger('episodio');
            $table->unsignedSmallInteger('durata');
            $table->char('anno',4)->nullable();
            $table->char('visualizzato', 1)->default(0);
            $table->unsignedBigInteger('idFile')->nullable();
            $table->unsignedBigInteger('idVideo')->nullable();

            $table->foreign('idSerieTv')->references('idSerieTv')->on('serie_tv');
            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodi');
    }
};
