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
        Schema::create('attendance_time_configs', function (Blueprint $table) {
            $table->id();
            $table->string('shift');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('delay_time')->nullable();
            $table->enum('sms_status', [1, 2, 3, 4])->default(4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_time_configs');
    }
};
