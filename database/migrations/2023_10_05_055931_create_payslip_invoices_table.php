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
        Schema::create('payslip_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_id')->comment('custom generate id');
            $table->unsignedBigInteger('payslip_salary_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payslip_invoices');
    }
};
