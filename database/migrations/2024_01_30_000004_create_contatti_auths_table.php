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
        Schema::create('contatti_auths', function (Blueprint $table) {
            $table->id('idAuth');
            $table->unsignedBigInteger('idContatto');
            $table->string('username',255)->unique();
            $table->string('email',250)->unique()->nullable();
            $table->string('sfida',255)->nullable();
            $table->string('secretJWT',255);
            $table->unsignedInteger('inizioSfida')->default(0);
            $table->unsignedTinyInteger('obbligoCambio')->default(0);

            $table->softDeletes();
            $table->timestamps();

            $table->foreign("idContatto")->references("idContatto")->on("contatti");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contatti_auths');
    }
};
