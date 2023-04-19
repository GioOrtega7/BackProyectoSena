<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionCompetenciasRapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacionCompetenciasRaps', function (Blueprint $table) {
            $table->unsignedBigInteger('idcompetencia');
            $table->foreign('idCompetencia')->references('id')->on('competencias');

            $table->foreign('rap')->references('id')->on('resultadoAprendizaje');
            $table->unsignedInteger('rap');


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
        Schema::dropIfExists('asignacionCompetenciasRaps');
    }
}
