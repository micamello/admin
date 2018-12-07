<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_usuario_plan', function (Blueprint $table) {
            $table->increments('id_usuario_plan');
            $table->unsignedInteger('id_usuario');
            $table->foreign('id_usuario')->references('id_usuario')->on('mfo_usuario');
            $table->unsignedInteger('id_plan');
            $table->foreign('id_plan')->references('id_plan')->on('mfo_plan');
            $table->tinyInteger('estado');
            $table->dateTime('fecha_compra');
            $table->unsignedInteger('id_comprobante');
            $table->foreign('id_comprobante')->references('id_comprobante')->on('mfo_rcomprobantescam');
            $table->integer('num_post_rest');
            $table->dateTime('fecha_caducidad');
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
        Schema::dropIfExists('mfo_usuario_plan');
    }
}
