<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoJornadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacionJornadaGrupo', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idGrupo');
            $table->foreign('idGrupo')->references('id')->on('grupo')->onDelete('cascade');
            $table->unsignedBigInteger('idJornada');
            $table->foreign('idJornada')->references('id')->on('jornada')->onDelete('cascade');
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
        Schema::dropIfExists('grupo_jornadas');
    }
}
