<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioNivelidiomaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_usuario_nivelidioma', function (Blueprint $table) {
            $table->increments('id_usuario_nivelidioma');
            $table->unsignedInteger('id_nivelIdioma_idioma');
            $table->foreign('id_nivelIdioma_idioma')->references('id_nivelIdioma_idioma')->on('mfo_nivelidioma_idioma');
            $table->unsignedInteger('id_usuario');
            $table->foreign('id_usuario')->references('id_usuario')->on('mfo_usuario');
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
        Schema::dropIfExists('mfo_usuario_nivelidioma');
    }
}
