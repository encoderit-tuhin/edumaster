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
        Schema::create('exam_subject_mark_configs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exam_id');
            $table->unsignedBigInteger('exam_type_id');
            $table->unsignedBigInteger('exam_schedule_id');
            $table->string('date_time');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('objective')->default('0')->nullable();
            $table->unsignedBigInteger('opm')->default('0')->nullable();
            $table->unsignedBigInteger('written')->default('0')->nullable();
            $table->unsignedBigInteger('wpm')->default('0')->nullable();
            $table->unsignedBigInteger('practical')->default('0')->nullable();
            $table->unsignedBigInteger('ppm')->default('0')->nullable();
            $table->unsignedBigInteger('total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_subject_mark_configs');
    }
};
