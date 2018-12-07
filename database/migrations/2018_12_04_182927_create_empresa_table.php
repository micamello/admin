<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_empresa', function (Blueprint $table) {
            $table->increments('id_empresa');
            $table->string('telefono',25);
            $table->string('nombres',100);
            $table->dateTime('fecha_nacimiento');
            $table->dateTime('fecha_creacion');
            $table->tinyInteger('foto');
            $table->tinyInteger('estado');
            $table->tinyInteger('term_cond');
            $table->tinyInteger('conf_datos');
            $table->unsignedInteger('id_ciudad');
            $table->foreign('id_ciudad')->references('id_ciudad')->on('mfo_ciudad');
            $table->dateTime('ultima_sesion');
            $table->unsignedInteger('id_nacionalidad');
            $table->foreign('id_nacionalidad')->references('id_pais')->on('mfo_pais');
            $table->unsignedInteger('id_usuario_login');
            $table->foreign('id_usuario_login')->references('id_usuario_login')->on('mfo_usuario_login');
            $table->unsignedInteger('padre');
            $table->foreign('padre')->references('id_empresa')->on('mfo_empresa');
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
        Schema::dropIfExists('mfo_empresa');
    }
}
