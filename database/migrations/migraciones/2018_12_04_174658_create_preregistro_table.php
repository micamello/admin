<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreregistroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_preregistro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres',100);
            $table->string('apellidos',100);
            $table->string('correo',200);
            $table->integer('tipo_doc');
            $table->string('dni',100);
            $table->string('telefono',20);
            $table->dateTime('fecha');
            $table->integer('tipo_usuario');
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
        Schema::dropIfExists('mfo_preregistro');
    }
}
