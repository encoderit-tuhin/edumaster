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
        Schema::create('previous_institutes', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->string('institute_name')->nullable();
            $table->string('institute_address')->nullable();
            $table->string('institute_no')->nullable();
            $table->string('institute_mobile')->nullable();
            $table->string('institute_phone')->nullable();
            $table->string('institute_email')->nullable();
            $table->string('time_period')->nullable();
            $table->string('last_education')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('previous_institutes');
    }
};