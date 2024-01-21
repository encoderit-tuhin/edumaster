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
        Schema::create('student_collections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('class_id');
            $table->string('invoice_id')->unique();
            $table->date('invoice_date')->nullable();
            $table->unsignedBigInteger('session_id')->comment('Academic year');
            $table->decimal('attendance_fine', 8, 2)->default(0);
            $table->decimal('total_payable', 8, 2)->default(0);
            $table->decimal('total_paid', 8, 2)->default(0);
            $table->decimal('total_due', 8, 2)->default(0);
            $table->text('note')->nullable();

            $table->unsignedBigInteger('ledger_id')->nullable();
            $table->unsignedBigInteger('receive_ledger_id')->nullable();
            $table->unsignedBigInteger('fund_id')->nullable();

            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_collections');
    }
};
