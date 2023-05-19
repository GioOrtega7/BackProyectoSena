<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableInfraestructura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('infraestructura', function (Blueprint $table) {
            $table->unsignedInteger('idSede');
            $table->foreign('idSede')->references('id')->on('sede')->onDelete('cascade');
            $table->unsignedInteger('idArea') -> nullable();
            $table->foreign('idArea')->references('id')->on('area')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('infraestructura', function (Blueprint $table) {
            $table->dropForeign(['idSede']);
            $table->dropColumn('idSede');
            $table->dropForeign(['idArea']);
            $table->dropColumn('idArea');
        });
    }
}
