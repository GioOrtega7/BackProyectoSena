<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentroFormacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centro_formacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreCentro');

            $table->unsignedInteger('idRegional');
            $table->foreign('idRegional')->references('id')->on('regional');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('centro_formacions');
    }
}
