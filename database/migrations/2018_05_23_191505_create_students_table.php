<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('parent_id')->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('birthday')->nullable();
            $table->string('gender', 10);
            $table->string('blood_group', 4)->nullable();
            $table->string('religion', 20);
            $table->string('phone', 15)->nullable();
            $table->text('address')->nullable();
            $table->string('state')->nullable();
            $table->string('country', 100)->nullable();
            $table->string('register_no', 50)->nullable();
            $table->string('roll_no', 50)->nullable();
            $table->string('group')->nullable();
            $table->string('activities')->nullable();
            $table->text('remarks')->nullable();
            $table->unsignedBigInteger('student_category_id')->default(1);
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
        Schema::dropIfExists('students');
    }
}
