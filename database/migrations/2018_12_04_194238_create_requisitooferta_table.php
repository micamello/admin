<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisitoofertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_requisitooferta', function (Blueprint $table) {
            $table->increments('id_requisitoOferta');
            $table->tinyInteger('licencia');
            $table->tinyInteger('viajar');
            $table->tinyInteger('residencia');
            $table->tinyInteger('discapacidad');
            $table->tinyInteger('confidencial');
            $table->integer('edad_minima');
            $table->integer('edad_maxima');
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
        Schema::dropIfExists('mfo_requisitooferta');
    }
}
