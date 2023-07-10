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
        Schema::create('joueurs', function (Blueprint $table) {
            $table->id();
            $table->string('mailJoueur')->unique();
            $table->enum('poste', ['DC', 'DLD','DLG', 'MC', 'MD', 'MG', 'MO', 'MOC', 'AG', 'AD', 'AP', 'G']);
            $table->string('nomJoueur');
            $table->string('prenomJoueur');
            $table->string('adresseJoueur');
            $table->boolean('estValide');
            $table->string('lieuNaissance');
            $table->date('dateNaissance');
            $table->boolean('estGardien');
            $table->unsignedBigInteger('centre_formation_id')->nullable();
            $table->foreign('centre_formation_id')->references('id')->on('centre_formations')->onDelete('set null');

            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('joueurs');
    }
};
