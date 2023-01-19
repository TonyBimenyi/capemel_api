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
        Schema::create('cotisations', function (Blueprint $table) {
            $table->id();
            $table->Float('montant_paye');
            $table->Float('montant_a_paye');
            $table->string('trimestre',50);
            $table->Integer('annee',10);
            $table->string('numero_bordereau');
            $table->Date('date_paiement')->nullable();
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
        Schema::dropIfExists('cotisations');
    }
};
