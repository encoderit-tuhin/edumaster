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
        Schema::create('fee_date_configs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fee_sub_head_id');
            $table->date('payable_date_start');
            $table->date('payable_date_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_date_configs');
    }
};
