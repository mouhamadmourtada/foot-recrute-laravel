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
        Schema::table('recruteurs', function (Blueprint $table) {

            $table->string('email')->unique();
            $table->dropColumn('mailRecruteur');
            $table->dropColumn('estValide');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('isValidated');
            $table->rememberToken();

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recruteurs', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('email_verified_at');
            $table->dropColumn('password');
            $table->dropColumn('isVerified');
            // $table->rememberToken();
            $table->string('mailRecruteur');
            $table->boolean('estValide')->default(false);
        });
    }
};
