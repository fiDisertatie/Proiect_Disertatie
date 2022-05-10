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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('cnp')->unique();
            $table->string('nume');
            $table->string('initiala');
            $table->string('prenume1');
            $table->string('prenume2');
            $table->string('data_nastere');
            $table->string('localitate_nastere');
            $table->string('denumire_unitate');
            $table->string('nivel_invatamant');
            $table->string('tip_formatiune');
            $table->string('nume_clasa');
            $table->string('forma_invatamant');
            $table->string('specializare_calificare');
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
        Schema::dropIfExists('students');
    }
};
