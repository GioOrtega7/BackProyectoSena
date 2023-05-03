<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorarioInfraestructuraGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarioInfraestructuraGrupo', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('idInfraestructura');
            $table->foreign('idInfraestructura')->references('id')->on('infraestructura')->onDelete('cascade');

            $table->unsignedInteger('idGrupo');
            $table->foreign('idGrupo')->references('id')->on('grupo')->onDelete('cascade');
            
            $table->date('fechaInicial');
            $table->date('fechaFinal');
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
        Schema::dropIfExists('horario_infraestructura_grupos');
    }
}
