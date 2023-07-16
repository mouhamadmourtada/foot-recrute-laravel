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
        Schema::create('recruteurs', function (Blueprint $table) {
            $table->id();
            $table->string('nomRecruteur');
            $table->string('prenomRecruteur');
            $table->string('adresseRecruteur');
            $table->string('mailRecruteur');
            $table->integer('prestige')->nullable();
            $table->boolean('estValide')->default(false);
            $table->enum('etat', ['actif', 'inactif'])->default('actif');
            $table->string('structure')->nullable();

            $table->timestamps();
        });

        Schema::create('recruteur_joueur', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recruteur_id');
            $table->unsignedBigInteger('joueur_id');
            $table->timestamps();

            $table->foreign('recruteur_id')->references('id')->on('recruteurs')->onDelete('cascade');
            $table->foreign('joueur_id')->references('id')->on('joueurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruteur_joueur');
        Schema::dropIfExists('recruteurs');
    }
};
