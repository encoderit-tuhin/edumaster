<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('department_id')->nullable();
            $table->string('name');
            $table->string('designation');
            $table->date('birthday')->nullable();
            $table->string('gender', 20);
            $table->string('religion', 20)->nullable();
            $table->string('phone', 20);
            $table->string('blood')->nullable();
            $table->integer('sl')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('mobile_no')->nullable();

            $table->string('resign_date')->nullable();
            $table->text('resign_note')->nullable();
            $table->string('category')->nullable();

            $table->string('father_name')->nullable();
            $table->string('nationality')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('national_id')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('no_of_child')->nullable();
            $table->string('tin_no')->nullable();
            $table->string('specialization')->nullable();
            $table->string('mpo_id')->nullable();
            $table->text('hobby')->nullable();
            $table->string('index_no')->nullable();
            $table->string('language')->nullable();
            $table->text('extra_curriculum')->nullable();
            $table->text('address')->nullable();
            $table->date('joining_date')->nullable();
            $table->text('permanent_address')->nullable();

            $table->string('education')->nullable();
            $table->string('cgpa_gpa')->nullable();
            $table->string('institute_name')->nullable();
            $table->string('out_of_cgpa_gpa')->nullable();
            $table->string('board')->nullable();
            $table->string('passing_year')->nullable();
            $table->string('group')->nullable();
            $table->string('edu_duration')->nullable();
            $table->string('subject')->nullable();
            $table->string('achivement')->nullable();
            $table->string('marks')->nullable();
            $table->string('division_grade')->nullable();
            $table->string('attachment')->nullable();

            $table->string('organization_name')->nullable();
            $table->date('exp_joining_date')->nullable();
            $table->date('exp_resign_date')->nullable();
            $table->string('organization_type')->nullable();
            $table->string('exp_designation')->nullable();
            $table->string('exp_duration')->nullable();
            $table->string('exp_department')->nullable();
            $table->string('location')->nullable();
            $table->text('responsibility')->nullable();
            $table->string('exp_attachment')->nullable();

            $table->string('training_title')->nullable();
            $table->string('trainging_location')->nullable();
            $table->string('trainging_institute')->nullable();
            $table->string('trainging_country')->nullable();
            $table->string('trainging_topic')->nullable();
            $table->string('trainging_achivement')->nullable();
            $table->string('trainging_duration')->nullable();
            $table->text('trainging_note')->nullable();
            $table->date('trainging_join_date')->nullable();
            $table->date('trainging_end_date')->nullable();
            $table->string('trainging_attachment')->nullable();

            $table->string('bank_account_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_status')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_account_type')->nullable();
            $table->string('bank_account_branch')->nullable();

            $table->string('reference_name')->nullable();
            $table->string('reference_organization')->nullable();
            $table->string('reference_designation')->nullable();
            $table->string('reference_relation')->nullable();
            $table->string('reference_mobile')->nullable();
            $table->string('reference_address')->nullable();
            $table->string('reference_email')->nullable();

            $table->enum('is_administrator', [0, 1])->default(0);
            $table->enum('is_visible_website', [0, 1])->default(1);
            $table->enum('status', [0, 1])->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
