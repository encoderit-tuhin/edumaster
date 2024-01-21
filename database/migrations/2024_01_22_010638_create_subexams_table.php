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
        Schema::create('subexams', function (Blueprint $table) {
            $table->id();
            $table->string('subname')->nullable();
            $table->string('marks')->nullable();
            $table->unsignedInteger('exam_id')->nullable();
            $table->foreign('exam_id')
                ->references('id')
                ->on('exams')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                 $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subexams');
    }
};
