<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('product_details')) {
        
            Schema::create('product_details', function (Blueprint $table) {
                $table->id('product_id');
                $table->string('product_name');
                $table->string('product_description');
                $table->string('product_image');
                $table->string('product_size')->nullable();
                $table->string('price');
                $table->string('availability_status');
                $table->integer('pct_id');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        Schema::create('product_details', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('product_name');
            $table->string('product_description');
            $table->string('product_image');
            $table->string('price');
            $table->string('availability_status');
            $table->integer('pct_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_details');
    }
}
