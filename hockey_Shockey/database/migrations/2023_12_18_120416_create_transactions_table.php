<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('transactions')) {
            Schema::create('transactions', function (Blueprint $table) {
                $table->id();
                $table->string('ref_number')->nullable();
                $table->string('result_code');
                $table->string('result_message');
                $table->string('response_code');
                $table->string('auth_code')->nullable();
                $table->text('errors')->nullable();
                $table->integer('trans_id')->nullable();
                $table->string('status')->default('pending'); // Add the status column with a default value
                // Add any other fields you need
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
