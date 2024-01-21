<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('department_id')->nullable();
            $table->string('name');
            $table->string('designation');
            $table->date('birthday');
            $table->string('gender', 20);
            $table->string('religion', 20);
            $table->string('phone', 20);
            $table->string('blood')->nullable();
            $table->integer('sl')->nullable();
            $table->text('address');
            $table->date('joining_date')->nullable();
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
        Schema::dropIfExists('staffs');
    }
}
