<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject_name', 40);
            $table->string('subject_code', 20);
            $table->string('subject_short_form')->nullable();
            $table->string('subject_type', 30);
	        $table->string('subject_type_form', 30)->nullable();
            $table->unsignedBigInteger('class_id')->nullable();
            $table->unsignedBigInteger('sl_no')->default(20)->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->unsignedInteger('objective')->nullable()->default('0');
            $table->unsignedInteger('written')->nullable()->default('0');
            $table->unsignedInteger('practical')->nullable()->default('0');
            $table->unsignedInteger('full_mark')->nullable()->default('0');
            $table->unsignedInteger('pass_mark')->nullable()->default('0');
            $table->softDeletes();
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
        Schema::dropIfExists('subjects');
    }
}
