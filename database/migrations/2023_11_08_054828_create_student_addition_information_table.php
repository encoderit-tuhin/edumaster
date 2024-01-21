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
        Schema::create('student_addition_information', function (Blueprint $table) {
            $table->id();

            $table->string('student_id');
            $table->string('bangla_name')->nullable();
            $table->string('father_designation')->nullable();
            $table->string('father_nid')->nullable();
            $table->string('mother_nid')->nullable();
            $table->string('mother_phone')->nullable();
            $table->string('mother_designation')->nullable();
            $table->string('father_office_address')->nullable();
            $table->string('mother_office_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address_phone')->nullable();
            $table->string('present_address_phone')->nullable();
            $table->integer('monthly_income_parents')->nullable();
            $table->integer('monthly_income_family')->nullable();
            $table->string('permanent_district')->nullable();

            $table->string('post_office')->nullable();
            $table->string('police_station')->nullable();
            $table->text('progress_report_sent_to_relation')->nullable();
            $table->text('progress_report_sent_to_name')->nullable();
            $table->text('progress_report_sent_to_phone')->nullable();
            $table->text('progress_report_sent_to_address')->nullable();

            $table->string('local_guardian_name')->nullable();
            $table->string('local_guardian_relationship')->nullable();
            $table->string('local_guardian_nid')->nullable();
            $table->string('local_guardian_profession')->nullable();
            $table->string('local_guardian_phone')->nullable();
            $table->string('local_guardian_office_address')->nullable();
            $table->string('local_guardian_occupation')->nullable();
            $table->string('local_guardian_office_phone')->nullable();
            $table->string('local_guardian_designation')->nullable();
            $table->string('local_guardian_address')->nullable();







            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_addition_information');
    }
};