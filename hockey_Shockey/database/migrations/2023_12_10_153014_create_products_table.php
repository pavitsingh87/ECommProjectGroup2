<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id('product_id');
                $table->string('product_name');
                $table->string('product_description');
                $table->string('short_description')->nullable();
                $table->string('product_image');
                $table->string('product_size')->nullable();
                $table->string('price');
                $table->string('availability_status');
                $table->unsignedBigInteger('product_category_type_id');
                $table->foreign('product_category_type_id')->references('id')->on('product_category_type');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
