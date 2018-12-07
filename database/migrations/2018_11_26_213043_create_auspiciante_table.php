<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuspicianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_auspiciante', function (Blueprint $table) {
            $table->increments('id_auspiciante');
            $table->string('nombre',30);
            $table->mediumInteger('orden');
            $table->tinyInteger('estado');
            $table->string('extension',10);
            $table->text('url');
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
        Schema::dropIfExists('mfo_auspiciante');
    }
}
