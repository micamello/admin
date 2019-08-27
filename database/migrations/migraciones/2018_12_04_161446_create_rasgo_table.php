<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRasgoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_rasgo', function (Blueprint $table) {
            $table->increments('id_rasgo');
            $table->string('nombre',50);
            $table->integer('caract_max');
            $table->unsignedInteger('id_cuestionario');
            $table->foreign('id_cuestionario')->references('id_cuestionario')->on('mfo_cuestionario');
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
        Schema::dropIfExists('mfo_rasgo');
    }
}
