<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiasTable extends Migration
{
    public function up()
    {
        Schema::create('dia', function (Blueprint $table) {
            $table->id();
            $table->string('dia');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dia');
    }
}
