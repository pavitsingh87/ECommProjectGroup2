<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        if(!Schema::hasTable('orders')) {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // Add other order-related columns
            //
            $table->string('email');
            $table->string('delivery_method');
            $table->string('country');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->enum('payment_status', ['pending', 'success', 'cancelled','error'])->default('pending');
            $table->foreignId('user_id')->constrained(); // Foreign key to link with the users table
            $table->string('order_id')->unique()->nullable();
            $table->timestamps();
        });
    }
}
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
