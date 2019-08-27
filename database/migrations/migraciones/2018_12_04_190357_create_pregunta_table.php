<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_pregunta', function (Blueprint $table) {
            $table->increments('id_pre');
            $table->string('pregunta',250);
            $table->string('modo',50);
            $table->unsignedInteger('id_cuestionario');
            $table->foreign('id_cuestionario')->references('id_cuestionario')->on('mfo_cuestionario');
            $table->unsignedInteger('id_rasgo');
            $table->foreign('id_rasgo')->references('id_rasgo')->on('mfo_rasgo');
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mfo_pregunta');
    }
}
