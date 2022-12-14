<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membres', function (Blueprint $table) {
            $table->string('matricule_membre')->primary();
            $table->string('nom_membre');
            $table->string('prenom_membre');
            $table->string('nom_pere_membre')->nullable();
            $table->string('nom_mere_membre')->nullable();
            $table->date('date_naissance_membre')->nullable();
            $table->string('colline_membre')->nullable();
            $table->string('commune_membre')->nullable();
            $table->foreignId('nationalite_conjoint')->constrained('pays');
            $table->string('cin_membre');
            $table->date('debut_ministere_membre');
            $table->date('debut_cotisation_membre')->nullable();
            $table->date('date_mariage')->nullable();
            $table->Integer('telephone_membre')->nullable();
            $table->string('photo_membre')->nullable();
            $table->string('statut')->nullable();
            $table->Integer('surintendant');
            $table->foreignId('id_uti')->constrained('users');
            $table->foreignId('id_paroisse')->constrained('paroisses');
            $table->foreignId('id_categorie')->constrained('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membres');
    }
};
