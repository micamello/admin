<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForMejTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_for_mej', function (Blueprint $table) {
            $table->increments('id_fm');
            $table->string('nombre',200);
            $table->integer('max_rango');
            $table->integer('min_rango');
            $table->integer('id_tipo_for_mej');
            $table->unsignedInteger('id_rasgo');
            $table->foreign('id_rasgo')->references('id_rasgo')->on('mfo_rasgo');
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
        Schema::dropIfExists('mfo_for_mej');
    }
}
