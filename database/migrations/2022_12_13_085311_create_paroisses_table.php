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
        Schema::create('paroisses', function (Blueprint $table) {
            $table->id();
            $table->string('nom_paroisse');
            $table->foreignId('id_district')->constrained('districts');
            $table->string('nom_tut_paroisse')->nullable();
            $table->Integer('phone_tut_paroisse',80)->nullable();
            $table->string('email_tut_paroisse')->nullable();
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
        Schema::dropIfExists('paroisses');
    }
};
