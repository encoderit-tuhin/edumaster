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
        Schema::create('account_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('voucher_id')->unique();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('fund_id')->nullable();
            $table->unsignedBigInteger('fund_to_id')->nullable();
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->unsignedBigInteger('payment_method_to_id')->nullable();
            $table->date('transaction_date');
            $table->enum('type', ['payment', 'receipt', 'contra', 'fund_transfer', 'journal']);
            $table->string('reference')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_transactions');
    }
};
