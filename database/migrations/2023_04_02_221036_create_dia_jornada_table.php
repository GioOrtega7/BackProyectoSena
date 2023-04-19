<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaJornadaTable extends Migration
{
    public function up()
    {
        Schema::create('asignacionDiaJornada', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('idJornada');
            $table->foreign('idJornada')->references('id')->on('jornada')->onDelete('cascade');
            $table->unsignedBigInteger('idDia');
            $table->foreign('idDia')->references('id')->on('dia')->onDelete('cascade');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('asignacionDiaJornada');
    }
}
