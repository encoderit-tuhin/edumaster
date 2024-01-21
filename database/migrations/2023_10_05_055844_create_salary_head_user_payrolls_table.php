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
        Schema::create('salary_head_user_payrolls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_payroll_id');
            $table->unsignedBigInteger('salary_head_id');
            $table->decimal('amount', 10, 2)->default(0.0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_head_user_payrolls');
    }
};
