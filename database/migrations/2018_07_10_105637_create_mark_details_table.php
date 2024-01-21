<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarkDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mark_id');
            $table->string('mark_type',50);
            $table->string('attendance', 50)->nullable()->default(0);
            $table->string('monthly_test', 50)->nullable()->default(0);
            $table->string('objective', 50)->nullable()->default(0);
            $table->string('written', 50)->nullable()->default(0);
            $table->string('practical', 50)->nullable()->default(0);
            $table->decimal('mark_value',8,2)->nullable()->default(0);  
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
        Schema::dropIfExists('mark_details');
    }
}
