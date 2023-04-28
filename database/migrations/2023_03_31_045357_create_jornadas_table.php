<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJornadasTable extends Migration
{
    public function up()
    {
        Schema::create('jornada', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombreJornada');
            $table->text('descripcion');
            $table->time('horaInicial');
            $table->time('horaFinal');
            $table->integer('numeroHoras');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jornada');
    }
}
