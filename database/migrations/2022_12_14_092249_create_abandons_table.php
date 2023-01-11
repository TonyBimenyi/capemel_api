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
        Schema::create('abandons', function (Blueprint $table) {
            $table->id();
            $table->string('motif')->nullable();
            $table->string('type_abandon');
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
        Schema::dropIfExists('abandons');
    }
};
