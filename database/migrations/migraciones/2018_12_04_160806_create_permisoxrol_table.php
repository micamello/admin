<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisoxrolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_permisoxrol', function (Blueprint $table) {
            $table->increments('id_accionxrol');
            $table->unsignedInteger('id_rol');
            $table->foreign('id_rol')->references('id_rol')->on('mfo_rol');
            $table->unsignedInteger('id_accionSist');
            $table->foreign('id_accionSist')->references('id_accionSist')->on('mfo_accionsist');
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
        Schema::dropIfExists('mfo_permisoxrol');
    }
}
