<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostulacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_postulacion', function (Blueprint $table) {
            $table->increments('id_auto');
            $table->tinyInteger('tipo');
            $table->dateTime('fecha_postulado');
            $table->integer('resultado');
            $table->unsignedInteger('id_usuario');
            $table->foreign('id_usuario')->references('id_usuario')->on('mfo_usuario');
            $table->unsignedInteger('id_ofertas');
            $table->foreign('id_ofertas')->references('id_ofertas')->on('mfo_oferta');
            $table->float('asp_salarial');
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
        Schema::dropIfExists('mfo_postulacion');
    }
}
