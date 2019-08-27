<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfertaNivelidiomaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_oferta_nivelidioma', function (Blueprint $table) {
            $table->increments('id_ofertaNivel');
            $table->unsignedInteger('id_ofertas');
            $table->foreign('id_ofertas')->references('id_ofertas')->on('mfo_oferta');
            $table->unsignedInteger('id_nivelIdioma_idioma');
            $table->foreign('id_nivelIdioma_idioma')->references('id_nivelIdioma_idioma')->on('mfo_nivelidioma_idioma');
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
        Schema::dropIfExists('mfo_oferta_nivelidioma');
    }
}
