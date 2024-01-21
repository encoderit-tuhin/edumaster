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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('account_id')->nullable();
            $table->string('year');
            $table->string('month');
            $table->decimal('amount', 10, 2)->default(0.0);
            $table->enum('type', ['salary', 'due', 'advanced', 'advanced_return'])->default('due');
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->unsignedBigInteger('paid_by')->nullable();
            $table->longText('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
