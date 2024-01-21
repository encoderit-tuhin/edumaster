<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fee_map_fee_sub_head', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fee_map_id')->nullable();
            $table->unsignedBigInteger('fee_head_id')->nullable();
            $table->unsignedBigInteger('fee_sub_head_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_map_fee_sub_head');
    }
};
