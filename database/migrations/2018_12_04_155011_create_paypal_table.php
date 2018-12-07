<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaypalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mfo_paypal', function (Blueprint $table) {
            $table->increments('id_paypal');
            $table->dateTime('fecha');
            $table->tinyInteger('estado');
            $table->float('mc_gross');
            $table->string('protection_eligibility',50);
            $table->string('address_status',20);
            $table->string('payer_id',13);
            $table->string('address_street',200);
            $table->string('payment_date',28);
            $table->string('payment_status',50);
            $table->string('charset',50);
            $table->string('address_zip',20);
            $table->string('first_name',64);
            $table->float('mc_fee');
            $table->string('address_country_code',2);
            $table->string('address_name',128);
            $table->string('notify_version',50);
            $table->string('custom',255);
            $table->string('payer_status',10);
            $table->string('business',127);
            $table->string('address_country',64);
            $table->string('address_city',40);
            $table->tinyInteger('quantity');
            $table->string('verify_sign',255);
            $table->string('payer_email',127);
            $table->string('txn_id',50);
            $table->string('payment_type',50);
            $table->string('last_name',64);
            $table->string('address_state',40);
            $table->string('receiver_email',127);
            $table->float('payment_fee');
            $table->string('receiver_id',13);
            $table->string('txn_type',50);
            $table->string('item_name',127);
            $table->string('mc_currency',10);
            $table->string('item_number',127);
            $table->string('residence_country',2);
            $table->string('test_ipn',1);
            $table->string('transaction_subject',50);
            $table->float('payment_gross');
            $table->string('ipn_track_id',100);
            $table->string('parent_txn_id',50);
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
        Schema::dropIfExists('mfo_paypal');
    }
}
