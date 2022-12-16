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
        Schema::create('mutations', function (Blueprint $table) {
            $table->id();
            $table->string('matricule_membre');
            $table->foreign('matricule_membre')->references('matricule_membre')
            ->on('membres')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('paroisse_depart')->constrained('paroisses');
            $table->foreignId('paroisse_destination')->constrained('paroisses');
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
        Schema::dropIfExists('mutations');
    }
};
