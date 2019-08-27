<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaracteristicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_caracteristica', function (Blueprint $table) {
            $table->increments('id_caracteristica');
            $table->integer('num_car');
            $table->string('nombre',100);
            $table->text('descripcion');
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
        Schema::dropIfExists('mfo_caracteristica');
    }
}
