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
        Schema::create('student_online_registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('class_id');
            $table->unsignedInteger('session_id')->nullable();
            $table->unsignedInteger('section_id')->nullable();
            $table->unsignedInteger('group_id')->nullable()->comment('Class group id');
            $table->unsignedBigInteger('user_id')->nullable()->comment('User table id to match later');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->string('roll')->nullable();

            $table->string('first_name')->comment('Student Fullname');
            $table->string('phone', 15);
            $table->string('last_name')->nullable();
            $table->string('bangla_name')->nullable();
            $table->date('birthday');
            $table->string('gender', 10)->default('Male');
            $table->string('blood_group', 4)->nullable();
            $table->string('religion', 20);
            $table->string('sect', 20)->nullable()->comment('Sunni, Shia, Ahmadiyya, Others');
            $table->text('address', 100)->nullable();
            $table->string('state', 20)->nullable();
            $table->string('country', 40)->nullable();
            $table->string('home', 30)->nullable();
            $table->string('image', 50)->nullable();

            $table->string('father_name', 50);
            $table->string('father_phone_no', 11)->nullable();
            $table->string('father_occupation', 50)->nullable();
            $table->string('father_designation', 50)->nullable();
            $table->string('father_office_address', 100)->nullable();
            $table->string('father_nid', 20)->nullable()->comment('filled by office');

            $table->string('mother_name', 50);
            $table->string('mother_phone_no', 11)->nullable();
            $table->string('mother_occupation', 50)->nullable();
            $table->string('mother_designation', 50)->nullable();
            $table->string('mother_office_address', 100)->nullable();
            $table->string('mother_nid', 20)->nullable()->comment('filled by office');

            $table->string('permanent_address', 100)->nullable();
            $table->string('present_address', 100)->nullable();
            $table->string('permanent_address_phone', 11)->nullable();
            $table->string('present_address_phone', 11)->nullable();
            $table->decimal('monthly_income_parents')->nullable();
            $table->decimal('monthly_income_family')->nullable();
            $table->string('permanent_district')->nullable();
            $table->string('nick_name')->nullable();
            $table->string('ssc_group')->nullable();
            $table->string('ssc_session', 10)->nullable();
            $table->string('school_name', 100)->nullable();
            $table->string('school_address', 100)->nullable();
            $table->string('board', 20)->nullable();
            $table->string('center', 100)->nullable();
            $table->year('passing_year')->nullable();
            $table->string('board_roll', 10)->nullable();
            $table->string('registration_number', 10)->nullable();

            // common subjects
            $table->string('bangla', 3)->nullable();
            $table->string('english', 3)->nullable();
            $table->string('math', 3)->nullable();
            $table->string('religion_sub', 3)->nullable();
            $table->string('ict', 3)->nullable();
            $table->string('career_education', 3)->nullable();
            $table->string('physical_education', 3)->nullable();

            // science subjects
            $table->string('physics', 3)->nullable();
            $table->string('chemistry', 3)->nullable();
            $table->string('bk', 3)->nullable();
            $table->string('higher_math', 3)->nullable();
            $table->string('biology', 3)->nullable();

            // business studies common
            $table->string('businessEnt', 3)->nullable();
            $table->string('financeBanking', 3)->nullable();
            $table->string('accounting', 3)->nullable();
            $table->string('management', 3)->nullable();

            // business studies and humanities combined
            $table->string('generalScience', 3)->nullable();

            // Humanities common
            $table->string('civicCitizenship', 3)->nullable();
            $table->string('geography', 3)->nullable();
            $table->string('economics', 3)->nullable();
            $table->string('historyBangladesh', 3)->nullable();

            // optional subject and grade
            $table->string('subject_4th')->nullable();
            $table->string('grade_4th_sub')->nullable();

            $table->unsignedFloat('gpa_with_4th')->nullable();
            $table->unsignedFloat('gpa_without_4th')->nullable();
            $table->unsignedInteger('total_a_plus')->nullable();
            $table->string('grade')->nullable(); // TODO: figure out which grade this is.
            $table->string('vital_201')->nullable();
            $table->date('date_of_admission')->nullable();
            $table->string('application_number', 20)->nullable();

            $table->string('birth_certificate_no', 30)->nullable();
            $table->string('nationality', 20)->nullable()->default('Bangladeshi');
            $table->string('ethnic')->nullable();

            // HSC
            $table->unsignedInteger('hsc_roll')->nullable();
            $table->unsignedInteger('hsc_year')->nullable();
            $table->unsignedInteger('hsc_reg')->nullable();
            $table->string('hsc_session', 20)->nullable();
            $table->unsignedFloat('hsc_gpa')->nullable();
            $table->unsignedInteger('hsc_total_a_plus')->nullable();
            $table->unsignedInteger('hsc_total_appeared')->nullable();
            $table->unsignedInteger('hsc_total_passed')->nullable();
            $table->unsignedFloat('hsc_percentage')->nullable();
            $table->string('hsc_tec')->nullable();
            $table->string('hsc_subject')->nullable();
            $table->string('hsc_total_combined')->nullable();

            // Local guardian
            $table->string('local_guardian_name')->nullable();
            $table->string('local_guardian_relation')->nullable();
            $table->string('local_guardian_occupation')->nullable();
            $table->string('local_guardian_designation')->nullable();
            $table->string('local_guardian_phone_res', 11)->nullable();
            $table->string('local_guardian_phone_office', 11)->nullable();
            $table->string('local_guardian_nid')->nullable();
            $table->string('local_guardian_organization')->nullable();
            $table->string('local_guardian_address')->nullable();

            // Information sent to whom.
            $table->string('information_sent_to_name')->nullable();
            $table->string('information_sent_to_relation')->nullable();
            $table->string('information_sent_to_phone', 11)->nullable();
            $table->string('information_sent_to_address')->nullable();

            // co-curricular activities
            $table->text('co_curricular_activities_sports')->nullable();
            $table->text('co_curricular_activities_clubs')->nullable();
            $table->text('co_curricular_activities_others')->nullable();

            // vital sports
            $table->text('vital_sports')->nullable();
            $table->text('vital_sports_college_team')->nullable();
            $table->text('vital_sports_inter_class')->nullable();
            $table->text('vital_sports_awards')->nullable();

            $table->string('serial_no')->nullable();
            $table->string('admission_place')->nullable();

            $table->string('elective_subject')->nullable();
            $table->string('optional_subject')->nullable();

            // Additional Info Update
            $table->string('dropped_date')->nullable();
            $table->string('recommendation_gives_on')->nullable();
            $table->string('reason')->nullable();
            $table->string('remarks')->nullable();
            $table->string('scholarship_type', 20)->nullable();
            $table->unsignedFloat('annual_lump_grant_1st_year_tk')->default(0);
            $table->unsignedFloat('annual_lump_grant_2nd_year_tk')->default(0);
            $table->unsignedFloat('monthly_tk')->nullable();
            $table->unsignedInteger('period_total_months')->nullable();
            $table->unsignedInteger('from_year')->nullable();
            $table->unsignedInteger('to_year')->nullable();

            // Period(Total Months)
            $table->string('tc_date')->nullable();
            $table->string('field_one')->nullable();
            $table->string('field_two')->nullable();
            $table->boolean('promoted_to_class_xll')->default(0);
            $table->string('science_club')->nullable();
            $table->string('science_club_awards')->nullable();
            $table->string('science_fair')->nullable();
            $table->string('science_fair_awards')->nullable();
            $table->string('com_arts_sci_club')->nullable();
            $table->string('com_arts_sci_awards')->nullable();
            $table->string('notre_dame_volunteers_alliance')->nullable();
            $table->string('notre_dame_volunteers_alliance_awards')->nullable();
            $table->string('debate_collage')->nullable();
            $table->string('inter_collage')->nullable();
            $table->string('inter_collage_awards')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_online_registrations');
    }
};
