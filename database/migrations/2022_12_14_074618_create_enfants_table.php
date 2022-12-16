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
        Schema::create('enfants', function (Blueprint $table) {
            $table->id();
            $table->string('nom_enfant',80);
            $table->string('prenom_enfant',80);
            $table->date('date_naissance_enfant');
            $table->foreignId('id_uti')->constrained('users');
            $table->string('matricule_membre');
            $table->foreign('matricule_membre')->references('matricule_membre')
            ->on('membres')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('enfants');
    }
};
