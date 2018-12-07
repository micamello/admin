<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_admin', function (Blueprint $table) {
            $table->increments('id_admin');
            $table->string('username',50)->unique();
            $table->string('password',60);
            $table->string('correo',100)->unique();
            $table->tinyInteger('estado');
            $table->dateTime('ultima_sesion');
            $table->unsignedInteger('id_rol');
            $table->foreign('id_rol')->references('id_rol')->on('mfo_rol');
            $table->string('remember_token');
            $table->string('nombres');
            $table->dateTime('updated_at');
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
        Schema::dropIfExists('mfo_admin');
    }
}
