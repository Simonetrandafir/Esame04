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
        Schema::create('serie_tv', function (Blueprint $table) {
            $table->id('idSerieTv');
            $table->unsignedBigInteger('idCategoria');
            $table->unsignedBigInteger('idGenere');
            $table->string('titolo',45);
            $table->longText('trama');
            $table->unsignedTinyInteger('totStagioni');
            $table->unsignedSmallInteger('nEpisodi');
            $table->string('regista',45)->nullable()->index();
            $table->string('attori',255)->nullable();
            $table->char('annoInizio',4)->index();
            $table->char('annoFine',4)->nullable();
            $table->char('visualizzato', 1)->default(0);
            $table->unsignedBigInteger('idFile')->nullable();
            $table->unsignedBigInteger('idVideo')->nullable();

            $table->foreign('idCategoria')->references('idCategoria')->on('categorie');
            $table->foreign('idGenere')->references('idGenere')->on('genere');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serie_tv');
    }
};
