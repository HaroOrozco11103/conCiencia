<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Participacions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participacions', function (Blueprint $table) {
            $table->id();
            //$table->increments('id');
            $table->unsignedInteger('dinamica_id');
            $table->foreign('dinamica_id')->references('id')->on('dinamicas');
            $table->integer('puntaje')->default(-1);
            $table->unsignedInteger('alumno_id')->nullable();
            $table->foreign('alumno_id')->references('id')->on('alumnos');
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
        Schema::dropIfExists('participacions');
    }
}
