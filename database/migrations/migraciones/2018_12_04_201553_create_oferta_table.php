<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_oferta', function (Blueprint $table) {
            $table->increments('id_ofertas');
            $table->unsignedInteger('id_empresa');
            $table->foreign('id_empresa')->references('id_empresa')->on('mfo_empresa');
            $table->string('titulo',100);
            $table->text('descripcion');
            $table->float('salario');
            $table->dateTime('fecha_contratacion');
            $table->integer('vacantes');
            $table->integer('anosexp');
            $table->tinyInteger('estado');
            $table->dateTime('fecha_creado');
            $table->integer('tipo');
            $table->unsignedInteger('id_area');
            $table->foreign('id_area')->references('id_area')->on('mfo_area');
            $table->unsignedInteger('id_nivelInteres');
            $table->foreign('id_nivelInteres')->references('id_nivelInteres')->on('mfo_nivelinteres');
            $table->unsignedInteger('id_jornada');
            $table->foreign('id_jornada')->references('id_jornada')->on('mfo_jornada');
            $table->unsignedInteger('id_ciudad');
            $table->foreign('id_ciudad')->references('id_ciudad')->on('mfo_ciudad');
            $table->unsignedInteger('id_requisitoOferta');
            $table->foreign('id_requisitoOferta')->references('id_requisitoOferta')->on('mfo_requisitooferta');
            $table->unsignedInteger('id_escolaridad');
            $table->foreign('id_escolaridad')->references('id_escolaridad')->on('mfo_escolaridad');
            $table->unsignedInteger('id_empresa_plan');
            $table->foreign('id_empresa_plan')->references('id_empresa_plan')->on('mfo_empresa_plan');
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
        Schema::dropIfExists('mfo_oferta');
    }
}
