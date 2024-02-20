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
        Schema::create('film', function (Blueprint $table) {
            $table->id('idFilm');
            $table->unsignedBigInteger('idCategoria');
            $table->unsignedBigInteger('idGenere');
            $table->string('titolo', 45);
            $table->longText('trama');
            $table->string('durataMin', 20);
            $table->char('annoUscita', 4)->index();
            $table->string('regista', 45)->index()->nullable();
            $table->string('attori', 255)->index()->nullable();
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
        Schema::dropIfExists('film');
    }
};
