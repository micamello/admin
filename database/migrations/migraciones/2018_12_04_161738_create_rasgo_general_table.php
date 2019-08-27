<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRasgoGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_rasgo_general', function (Blueprint $table) {
            $table->increments('id_rasgo_general');
            $table->string('nombre',45);
            $table->integer('min_rango');
            $table->integer('max_rango');
            $table->text('descripcion');
            $table->unsignedInteger('id_cuestionario');
            $table->foreign('id_cuestionario')->references('id_cuestionario')->on('mfo_cuestionario');
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
        Schema::dropIfExists('mfo_rasgo_general');
    }
}
