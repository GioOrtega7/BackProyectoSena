<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programa', function (Blueprint $table) {
            $table->increments('id');          
            $table->string('nombrePrograma');
            $table->string('codigoPrograma');
            $table->text('descripcionPrograma');
            $table->string('ruta');

            $table->unsignedInteger('idTipoPrograma');
            $table->foreign('idTipoPrograma')->references('id')->on('tipoPrograma');

            $table->unsignedInteger('idEstado');
            $table->foreign('idEstado')->references('id')->on('estado');

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
        Schema::dropIfExists('programa');
    }
}
