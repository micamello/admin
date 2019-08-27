<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_descarga', function (Blueprint $table) {
            $table->increments('id_descarga');
            $table->unsignedInteger('id_infohv');
            $table->foreign('id_infohv')->references('id_infohv')->on('mfo_infohv');
            $table->unsignedInteger('id_empresa');
            $table->foreign('id_empresa')->references('id_empresa')->on('mfo_empresa');
            $table->unsignedInteger('id_ofertas');
            $table->foreign('id_ofertas')->references('id_ofertas')->on('mfo_oferta');
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
        Schema::dropIfExists('mfo_descarga');
    }
}
