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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('section');
            $table->integer('group');
            $table->integer('class');
            $table->integer('subject_id');
            $table->string('quiz1');
            $table->string('quiz2');
            $table->string('quiz3');
            $table->string('quiz4');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
