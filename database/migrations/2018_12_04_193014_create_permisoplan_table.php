<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisoplanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_permisoplan', function (Blueprint $table) {
            $table->increments('id_permisoPlan');
            $table->unsignedInteger('id_plan');
            $table->foreign('id_plan')->references('id_plan')->on('mfo_plan');
            $table->unsignedInteger('id_accionSist');
            $table->foreign('id_accionSist')->references('id_accionSist')->on('mfo_accionsist');
            $table->integer('orden');
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
        Schema::dropIfExists('mfo_permisoplan');
    }
}
