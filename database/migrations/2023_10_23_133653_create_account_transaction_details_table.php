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
        Schema::create('account_transaction_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_transactions_id');
            $table->unsignedBigInteger('fund_id')->nullable();
            $table->unsignedBigInteger('fund_to_id')->nullable();
            $table->unsignedBigInteger('ledger_id')->nullable();
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->unsignedBigInteger('payment_method_to_id')->nullable();
            $table->date('transaction_date');
            $table->decimal('debit', 10, 2)->default(0.0);
            $table->decimal('credit', 10, 2)->default(0.0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_transaction_details');
    }
};
