<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_plan', function (Blueprint $table) {
            $table->increments('id_plan');
            $table->unsignedInteger('id_sucursal');
            $table->foreign('id_sucursal')->references('id_sucursal')->on('mfo_sucursal');
            $table->string('nombre',100);
            $table->tinyInteger('estado');
            $table->integer('num_post');
            $table->tinyInteger('promocional');
            $table->float('costo');
            $table->integer('duracion');
            $table->integer('tipo_usuario');
            $table->integer('tipo_plan');
            $table->integer('porc_descarga');
            $table->string('extension',10);
            $table->string('codigo_paypal',50);
            $table->integer('num_cuenta');
            $table->integer('visibilidad');
            $table->dateTime('fecha_inicio');
            $table->float('prom_costo');
            $table->integer('prom_num_post');
            $table->integer('prom_porc_descarga');
            $table->integer('prom_duracion');
            $table->string('prom_codigo_paypal',50);
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
        Schema::dropIfExists('mfo_plan');
    }
}
