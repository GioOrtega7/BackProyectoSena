<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialFormacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_formacions', function (Blueprint $table) {
            $table->id();
            $table->string('codigoMF')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('rutaarchivo')->nullable();

/*             $table->unsignedInteger('idAA')->nullable(); */
            // Resto de las columnas de la tabla materialformacion
            
/*             $table->foreign('idAA')
                  ->references('id')
                  ->on('actividadaprendizaje')
                  ->onDelete('cascade'); */



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
        Schema::dropIfExists('material_formacions');
    }
}
