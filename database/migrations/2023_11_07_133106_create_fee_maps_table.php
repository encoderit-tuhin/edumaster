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
        Schema::create('fee_maps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fee_head_id');
            $table->unsignedBigInteger('ledger_id');
            $table->string('fund')->nullable();
            $table->enum('type', ['fee', 'fee_fine'])->default('fee');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_maps');
    }
};
