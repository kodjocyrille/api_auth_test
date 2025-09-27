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
        Schema::create('anneescolaire', function (Blueprint $table) {
            $table->id();
            $table->string('annee_scolaire');
            $table->dateTime('debut_annee');
            $table->dateTime('fin_annee');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anneescolaire');
    }
};
