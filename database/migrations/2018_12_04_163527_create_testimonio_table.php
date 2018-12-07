<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_testimonio', function (Blueprint $table) {
            $table->increments('id_testimonio');
            $table->string('nombre',100);
            $table->string('profesion',100);
            $table->string('descripcion',200);
            $table->integer('orden');
            $table->tinyInteger('estado');
            $table->string('extension',10);
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
        Schema::dropIfExists('mfo_testimonio');
    }
}
