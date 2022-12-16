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
        Schema::create('conjoints', function (Blueprint $table) {
            $table->id();
            $table->string('nom_conjoint');
            $table->string('prenom_conjoint');
            $table->string('nom_pere_conjoint')->nullable();
            $table->string('nom_mere_conjoint')->nullable();
            $table->date('date_naissance_conjoint');
            $table->string('colline_conjoint')->nullable();
            $table->string('commune_conjoint')->nullable();
            $table->foreignId('nationalite_conjoint')->constrained('pays');
            $table->string('cin_conjoint');
            $table->string('etat_civil_conjoint');
            $table->string('fonction_conjoint')->nullable();
            $table->Integer('telephone_conjoint')->nullable()->unique();
            $table->string('photo_conjoint')->nullable();
            $table->foreignId('id_paroisse')->constrained('paroisses');
            $table->foreignId('id_uti')->constrained('users');
            $table->string('matricule_membre');
            $table->foreign('matricule_membre')->references('matricule_membre')->on('membres')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('conjoints');
    }
};
