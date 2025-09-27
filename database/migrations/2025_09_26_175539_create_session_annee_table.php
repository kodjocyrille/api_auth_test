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

        Schema::create('classe', function (Blueprint $table) {
            $table->id();
            $table->integer('effectif');
            $table->integer('nombre_garcon');
            $table->integer('nombre_fille');
            $table->string('nom_classe');

            $table->timestamps();
        });
        Schema::create('eleve', function (Blueprint $table) {
            $table->id();
            $table->string('nom_prenom');
            $table->integer('age');
            $table->string('sexe');
            $table->string('adresse');
            $table->string('telephone');
            $table->string('email')->unique();
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->string('matricule')->unique();
            $table->string('photo')->nullable();
            $table->string('nom_session');
            $table->foreignId('classe_id')
                ->constrained('classe')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('note_eleve', function (Blueprint $table) {
            $table->id();
            $table->float('valeur');
            $table->string('nom_session');
            $table->timestamps();
        });
        Schema::create('matiere', function (Blueprint $table) {
            $table->id();
            $table->string('nom_matiere');
            $table->integer('coefficient');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_annee');
    }
};
