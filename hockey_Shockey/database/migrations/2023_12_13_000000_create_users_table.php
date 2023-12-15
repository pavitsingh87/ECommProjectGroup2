<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('users')) {

            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('first_name');
                $table->string('last_name');
                $table->string('gender')->nullable();
                $table->date('date_of_birth');
                $table->string('email')->unique();
                // $table->timestamp('email_verified_at')->nullable()->default(now());
                $table->string('password');
                $table->string('contact_no');
                $table->string('user_name');
                $table->string('address_line_1')->nullable();
                $table->string('address_line_2')->nullable();
                $table->string('city');
                $table->string('province')->nullable();
                $table->string('country');
                $table->string('postal_code');
                $table->integer('role_id');
                $table->rememberToken();
                $table->timestamps();
                $table->foreign('province')->references('name')->on('provinces');
            });
        }
    }


    public function down()
    {
        Schema::dropIfExists('users');
    }
}
