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
        Schema::create('pensions', function (Blueprint $table) {
            $table->id();
            $table->Float('montant_pension');
            $table->string('type_pension');
            $table->string('matricule_membre');
            $table->foreign('matricule_membre')->references('matricule_membre')
            ->on('membres')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_uti')->constrained('users');
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
        Schema::dropIfExists('pensions');
    }
};
