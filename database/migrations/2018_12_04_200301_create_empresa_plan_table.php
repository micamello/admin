<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_empresa_plan', function (Blueprint $table) {
            $table->increments('id_empresa_plan');
            $table->unsignedInteger('id_empresa');
            $table->foreign('id_empresa')->references('id_empresa')->on('mfo_empresa');
            $table->unsignedInteger('id_plan');
            $table->foreign('id_plan')->references('id_plan')->on('mfo_plan');
            $table->tinyInteger('estado');
            $table->dateTime('fecha_compra');
            $table->unsignedInteger('id_comprobante');
            $table->foreign('id_comprobante')->references('id_comprobante')->on('mfo_rcomprobantescam');
            $table->integer('num_publicaciones_rest');
            $table->integer('num_descarga_rest');
            $table->dateTime('fecha_caducidad');
            $table->unsignedInteger('id_empresa_plan_parent');
            $table->foreign('id_empresa_plan_parent')->references('id_empresa_plan')->on('mfo_empresa_plan');
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
        Schema::dropIfExists('mfo_empresa_plan');
    }
}
