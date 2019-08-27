<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentasbancariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_cuentasbancarias', function (Blueprint $table) {
            $table->increments('id_cuentasBancarias');
            $table->string('nombres',30);
            $table->string('apellidos',30);
            $table->string('numero_cta',30);
            $table->string('nombre_banco',30);
            $table->string('dni',25);
            $table->tinyInteger('tipocta');
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
        Schema::dropIfExists('mfo_cuentasbancarias');
    }
}
