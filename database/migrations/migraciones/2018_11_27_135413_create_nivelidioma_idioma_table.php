<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNivelidiomaIdiomaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_nivelidioma_idioma', function (Blueprint $table) {
            $table->increments('id_nivelIdioma_idioma');
            $table->unsignedInteger('id_idioma');
            $table->unsignedInteger('id_nivelIdioma');
            $table->foreign('id_idioma')->references('id_idioma')->on('mfo_idioma');
            $table->foreign('id_nivelIdioma')->references('id_nivelIdioma')->on('mfo_nivelidioma');
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
        Schema::dropIfExists('mfo_nivelidioma_idioma');
    }
}
