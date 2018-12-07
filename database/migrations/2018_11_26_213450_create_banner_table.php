<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_banner', function (Blueprint $table) {
            $table->increments('id_banner');
            $table->string('nombre',50);
            $table->mediumInteger('orden');
            $table->integer('tipo');
            $table->text('url');
            $table->tinyInteger('estado');
            $table->string('extension',10);
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
        Schema::dropIfExists('mfo_banner');
    }
}
