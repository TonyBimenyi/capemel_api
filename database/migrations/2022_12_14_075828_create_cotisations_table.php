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
            $table->Float('montant_total');
            $table->Integer('trimestre');
            $table->string('annee',11);
            $table->string('donneur_district');
            $table->foreign('donneur_district')->references('id')
            ->on('districts')->onDelete('cascade')->onUpdate('cascade');
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
