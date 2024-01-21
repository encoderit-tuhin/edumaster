<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('leave_type', 50);
            $table->date('from_date');
            $table->date('to_date');
            $table->text('reason');
            $table->string('status')->default("pending");
            $table->unsignedBigInteger('approve_by')->nullable();
            $table->unsignedBigInteger('submit_by');
            $table->timestamps();

            // $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');;
            // $table->foreign('approve_by')->references('id')->on('users')->onDelete('cascade');;
            // $table->foreign('submit_by')->references('id')->on('users')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};