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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('an');
            $table->string('denumire_unitate');
            $table->string('nume');
            $table->string('initiala');
            $table->string('prenume');
            $table->string('statut');
            $table->string('categorie_personal');
            $table->string('disciplina_incadrare');
            $table->string('hash_unic');
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
        Schema::dropIfExists('teachers');
    }
};
