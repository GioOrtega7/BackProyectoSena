<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaseDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clase_documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tituloDocumento');
            $table->text('descripcion');
            $table->foreign('idEstado')->references('id')->on('estado');
            $table->unsignedInteger('idEstado');
            $table->foreign('idActividades')->references('id')->on('actividades');
            $table->unsignedInteger('idActividades');
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
        Schema::dropIfExists('clase_documentos');
    }
}
