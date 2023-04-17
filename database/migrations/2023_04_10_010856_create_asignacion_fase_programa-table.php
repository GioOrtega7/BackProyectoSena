<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionFaseProgramaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacionFaseProyecto', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idFase');
            $table->foreign('idFase')->references('id')->on('fase');

            $table->unsignedInteger('idPrograma');
            $table->foreign('idPrograma')->references('id')->on('programa');

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
        Schema::dropIfExists('asignacionFaseProyecto');
    }
}
