<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRcomprobantescamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_rcomprobantescam', function (Blueprint $table) {
            $table->increments('id_comprobante');
            $table->integer('tipo_usuario');
            $table->string('num_comprobante',50);
            $table->string('nombre',100);
            $table->string('correo',100);
            $table->string('telefono',25);
            $table->string('direccion',100);
            $table->string('dni',25);
            $table->dateTime('fecha_creacion');
            $table->float('valor');
            $table->tinyInteger('estado');
            $table->unsignedInteger('id_admin');
            $table->foreign('id_admin')->references('id_admin')->on('mfo_admin');
            $table->integer('tipo_pago');
            $table->string('ext_imagen',10);
            $table->dateTime('fecha_aprobacion');
            $table->unsignedInteger('id_plan');
            $table->foreign('id_plan')->references('id_plan')->on('mfo_plan');
            $table->integer('id_user_emp');
            $table->integer('tipo_doc');
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
        Schema::dropIfExists('mfo_rcomprobantescam');
    }
}
