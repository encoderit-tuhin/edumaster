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
        Schema::create('previous_exams', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->string('exam_name')->nullable();
            $table->string('ssc_group')->nullable();
            $table->string('ssc_board')->nullable();
            $table->string('ssc_roll_no')->nullable();
            $table->string('ssc_registration')->nullable();
            $table->string('ssc_session')->nullable();
            $table->string('ssc_grade')->nullable();
            $table->string('ssc_point')->nullable();
            $table->string('nick_name')->nullable();
            $table->string('school_name')->nullable();
            $table->string('school_address')->nullable();
            $table->string('center')->nullable();
            $table->year('ssc_passing_year')->nullable();
            $table->integer('bangla')->nullable();
            $table->integer('english')->nullable();
            $table->integer('math')->nullable();
            $table->integer('higher_math')->nullable();
            $table->float('gpa_with_4th')->nullable();
            $table->float('gpa_without_4th')->nullable();
            $table->integer('total_a_plus')->nullable();
            $table->integer('grade_4th_sub')->nullable();
            $table->string('hsc_result_roll_no')->nullable();
            $table->integer('hsc_result_year')->nullable();
            $table->string('hsc_result_reg_no')->nullable();
            $table->integer('hsc_result_session')->nullable();
            $table->float('hsc_result_gpa', 4, 2)->nullable();
            $table->integer('hsc_result_num_of_a_plus')->nullable();
            $table->integer('hsc_result_total_appeared')->nullable();
            $table->integer('hsc_result_total_passed')->nullable();
            $table->float('hsc_result_percentage', 5, 2)->nullable();
            $table->integer('hsc_result_total_examinees_combined')->nullable();
            $table->string('hsc_result_subjects_a_plus')->nullable();
            $table->string('ssc_physics')->nullable();
            $table->string('ssc_chemistry')->nullable();
            $table->string('ssc_biology')->nullable();
            $table->string('ssc_higherMath')->nullable();
            $table->string('ssc_bangladeshWorld')->nullable();
            $table->string('ssc_agricultureStudies')->nullable();
            $table->string('ssc_homeScience')->nullable();
            $table->string('ssc_other')->nullable();
            $table->string('ssc_financeBanking')->nullable();
            $table->string('ssc_accounting')->nullable();
            $table->string('ssc_businessEnt')->nullable();
            $table->string('ssc_generalScience')->nullable();
            $table->string('ssc_music')->nullable();
            $table->string('ssc_geography')->nullable();
            $table->string('ssc_civicCitizenship')->nullable();
            $table->string('ssc_economics')->nullable();
            $table->string('ssc_historyBangladesh')->nullable();
            $table->integer('section')->nullable()->nullable();
            $table->integer('religion')->nullable()->nullable();
            $table->integer('ethinic')->nullable()->nullable();
            $table->string('bk')->nullable()->nullable();
            $table->string('remarks_data')->nullable()->nullable();
            $table->string('subject_grade')->nullable()->nullable();
            $table->string('application_no')->nullable()->nullable();
            $table->string('date_of_admission')->nullable()->nullable();
            $table->string('serial_no')->nullable()->nullable();
            $table->string('place')->nullable()->nullable();
            // You can add more columns if needed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('previous_exams');
    }
};
