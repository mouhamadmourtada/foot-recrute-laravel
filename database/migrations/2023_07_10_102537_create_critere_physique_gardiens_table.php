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
        Schema::create('critere_physique_gardiens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gardien_id');
            $table->integer('saut');
            $table->integer('plongeon');
            $table->integer('arret');
            $table->integer('degageemnt');
            $table->integer('placement');
            $table->integer('reflex');

            $table->foreign('gardien_id')->references('id')->on('joueurs')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('critere_physique_gardiens');
    }
};
