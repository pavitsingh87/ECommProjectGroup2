<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentDetailTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('payment_detail')) {

            Schema::create('payment_detail', function (Blueprint $table) {
                $table->id('payment_id');
                $table->string('payment_type');
                $table->string('provider');
                $table->bigInteger('account_no');
                $table->date('expiry');
                $table->timestamps(); 
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('payment_detail');
    }
}
