<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_usuario_login', function (Blueprint $table) {
            $table->increments('id_usuario_login');
            $table->integer('tipo_usuario');
            $table->string('username',50)->unique();
            $table->string('password',100);
            $table->string('correo',100)->unique();
            $table->string('dni',25)->unique();
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
        Schema::dropIfExists('mfo_usuario_login');
    }
}
