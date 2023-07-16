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
        Schema::create('centre_formations', function (Blueprint $table) {
            $table->id();
            $table->string("nomCentre");
            $table->string("adresseCentre");
            $table->string("telephoneCentre");
            $table->string("mailCentre");
            $table->boolean("estInternation");
            $table->date("dateFondation");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centre_formations');
    }
};
