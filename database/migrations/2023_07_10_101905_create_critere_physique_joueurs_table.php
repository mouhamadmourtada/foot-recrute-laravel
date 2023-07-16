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
        Schema::create('critere_physique_joueurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('joueur_id');
            $table->integer('vitesse')->nullable();
            $table->integer('puissance')->nullable();
            $table->integer('endurance')->nullable();
            $table->float('taille')->nullable();
            $table->integer('controle')->nullable();
            $table->integer('passe')->nullable();
            $table->integer('tir')->nullable();
            $table->integer('dribble')->nullable();
            $table->integer('tete')->nullable();
            $table->enum('piedFort', ['Gauche', 'Droit'])->nullable();
            $table->integer('piedGauche')->nullable();
            $table->integer('piedDroit')->nullable();

            $table->foreign('joueur_id')->references('id')->on('joueurs')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('critere_physique_joueurs');
    }
};
