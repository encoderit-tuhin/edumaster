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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id');
            $table->string('exam_name');
            $table->string('board_name');
            $table->date('issue_date');
            $table->integer('passing_year');
            $table->string('session');
            $table->string('board_roll_no');
            $table->string('board_reg_no');
            $table->float('gpa');
            $table->string('grade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
