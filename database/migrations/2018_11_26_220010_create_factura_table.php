<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_factura', function (Blueprint $table) {
            $table->increments('id_factura');
            $table->dateTime('fecha_creacion');
            $table->text('xml');
            $table->integer('id_user_emp_plan');
            $table->mediumInteger('tipo_usuario');
            $table->dateTime('fecha_estado');
            $table->mediumInteger('estado');
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
        Schema::dropIfExists('mfo_factura');
    }
}
