<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('section_name');
            $table->string('room_no', 100)->nullable();
            $table->integer('class_id');
            $table->integer('class_teacher_id')->nullable();
            $table->integer('status')->default(1);
            $table->integer('rank')->nullable();
            $table->integer('capacity')->nullable();
            $table->integer('attendance_time_config_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
