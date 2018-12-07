<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpcionRespuestaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_opcion_respuesta', function (Blueprint $table) {
            $table->increments('id_opcion_respuesta');
            $table->unsignedInteger('id_opcion');
            $table->foreign('id_opcion')->references('id_opcion')->on('mfo_opcion');
            $table->unsignedInteger('id_pre');
            $table->foreign('id_pre')->references('id_pre')->on('mfo_pregunta');
            $table->integer('orden');
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
        Schema::dropIfExists('mfo_opcion_respuesta');
    }
}
