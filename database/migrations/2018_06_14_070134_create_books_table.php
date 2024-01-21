<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->nullable();
            $table->text('scheme_no')->nullable();
            $table->text('call_no')->nullable();
            $table->text('writer_name')->nullable();
            $table->string('name', 80)->nullable();
            $table->string('book_copy_no', 80)->nullable();
            $table->string('publisher', 80)->nullable();
            $table->date('publish_date', 12);
            $table->string('date')->nullable();
            $table->string('version', 80)->nullable();
            $table->string('price', 80)->nullable();
            $table->string('supplier', 80)->nullable();
            $table->string('total_page', 80)->nullable();
            $table->string('identify_page', 80)->nullable();
            $table->text('description')->nullable();
            $table->string('asset_no', 20)->nullable();
            $table->string('author', 80)->nullable();
            $table->string('code', 20)->nullable();
            $table->string('rack_no', 20)->nullable();
            $table->string('quantity', 12);
            $table->string('photo', 50)->default('book.png');
            $table->string('barcode', 255)->nullable();
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
        Schema::dropIfExists('books');
    }
}
