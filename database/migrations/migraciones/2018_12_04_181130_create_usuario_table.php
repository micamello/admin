<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_usuario', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->string('telefono',25);
            $table->string('nombres',100);
            $table->string('apellidos',100);
            $table->dateTime('fecha_nacimiento');
            $table->dateTime('fecha_creacion');
            $table->tinyInteger('foto');
            $table->string('token',100);
            $table->tinyInteger('estado');
            $table->tinyInteger('term_cond');
            $table->tinyInteger('conf_datos');
            $table->unsignedInteger('id_ciudad');
            $table->foreign('id_ciudad')->references('id_ciudad')->on('mfo_ciudad');
            $table->dateTime('ultima_sesion');
            $table->unsignedInteger('id_nacionalidad');
            $table->foreign('id_nacionalidad')->references('id_pais')->on('mfo_pais');
            $table->integer('tipo_doc');
            $table->integer('estado_civil');
            $table->tinyInteger('tiene_trabajo');
            $table->tinyInteger('viajar');
            $table->tinyInteger('licencia');
            $table->tinyInteger('discapacidad');
            $table->integer('anosexp');
            $table->tinyInteger('status_carrera');
            $table->unsignedInteger('id_escolaridad');
            $table->foreign('id_escolaridad')->references('id_escolaridad')->on('mfo_escolaridad');
            $table->string('genero',1);
            $table->unsignedInteger('id_univ');
            $table->foreign('id_univ')->references('id_univ')->on('mfo_universidades');
            $table->string('nombre_univ',100);
            $table->unsignedInteger('id_usuario_login');
            $table->foreign('id_usuario_login')->references('id_usuario_login')->on('mfo_usuario_login');
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
        Schema::dropIfExists('mfo_usuario');
    }
}
