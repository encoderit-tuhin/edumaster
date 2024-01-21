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
        Schema::create('accounting_ledgers', function (Blueprint $table) {
            $table->id();
            $table->string('ledger_name')->unique();
            $table->unsignedBigInteger('accounting_category_id')->nullable();
            $table->unsignedBigInteger('accounting_group_id')->nullable();
            $table->decimal('balance', 10, 2)->default(0.0);
            $table->enum('type', ['payment', 'default'])->default('default');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounting_ledgers');
    }
};
