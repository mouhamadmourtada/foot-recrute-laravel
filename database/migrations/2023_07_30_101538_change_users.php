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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('prenom');
            $table->string('nom');
            $table->boolean('isValidated');
            $table->string('adresse');
            $table->enum('role', ['admin', 'joueur', 'recruteur']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('prenom');
            $table->dropColumn('nom');
            $table->dropColumn('isValidated');
            $table->dropColumn('adresse');
            $table->dropColumn('role');
        });
    }
};
