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
        if (!Schema::hasTable('taxes')) {
            Schema::create('taxes', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('province_id');
                $table->decimal('gst_rate', 5, 2)->default(0);
                $table->decimal('pst_rate', 5, 2)->default(0);
                $table->decimal('hst_rate', 5, 2)->default(0);
                $table->timestamps();
                $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxes');
    }
};
