<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_informe', function (Blueprint $table) {
            $table->increments('id_informe');
            $table->text('infome');
            $table->dateTime('fecha');
            $table->unsignedInteger('id_cuestionario');
            $table->foreign('id_cuestionario')->references('id_cuestionario')->on('mfo_cuestionario');
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
        Schema::dropIfExists('mfo_informe');
    }
}
