<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSucursalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_sucursal', function (Blueprint $table) {
            $table->increments('id_sucursal');
            $table->string('dominio',45);
            $table->string('extensionicono',10);
            $table->string('extensionlogo',10);
            $table->string('iso',45);
            $table->integer('estado');
            $table->unsignedInteger('id_pais');
            $table->foreign('id_pais')->references('id_pais')->on('mfo_pais');
            $table->unsignedInteger('id_moneda');
            $table->foreign('id_moneda')->references('id_moneda')->on('mfo_moneda');
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
        Schema::dropIfExists('mfo_sucursal');
    }
}
