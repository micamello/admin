<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostulacionAutomaticaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_postulacion_automatica', function (Blueprint $table) {
            $table->increments('id_postauto');
            $table->unsignedInteger('id_postulacion');
            $table->foreign('id_postulacion')->references('id_auto')->on('mfo_postulacion');
            $table->unsignedInteger('id_usuarioplan');
            $table->foreign('id_usuarioplan')->references('id_usuario_plan')->on('mfo_usuario_plan');
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
        Schema::dropIfExists('mfo_postulacion_automatica');
    }
}
