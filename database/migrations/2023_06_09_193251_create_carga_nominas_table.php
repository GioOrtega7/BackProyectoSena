<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargaNominasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carga_nominas', function (Blueprint $table) {
            $table->id();
            $table->string('cedula')->nullable();
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('descripcionGrupoPrototipos')->nullable();
            $table->string('descripcionCargo')->nullable();
            $table->string('nombreCentroCosto')->nullable();
            $table->string('fechaInicio')->nullable();
            $table->string('fechaVencimiento')->nullable();
            $table->string('sueldoBasico')->nullable();
            $table->string('estado')->nullable();
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
        Schema::dropIfExists('carga_nominas');
    }
}
