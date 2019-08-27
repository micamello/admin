<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniversidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_universidades', function (Blueprint $table) {
            $table->increments('id_univ');
            $table->string('nombre',50);
            $table->string('iso',15);
            $table->unsignedInteger('id_pais');
            $table->foreign('id_pais')->references('id_pais')->on('mfo_pais');
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
        Schema::dropIfExists('mfo_universidades');
    }
}
