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
        Schema::create('medias', function (Blueprint $table) {
            $table->id();
            $table->longText('file');
            $table->string('type')->nullable();
            $table->longText('title')->nullable();
            $table->longText('alt_text')->nullable();
            $table->longText('caption')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('uploaded_by')->nullable();
            $table->unsignedBigInteger('media_category_id')->nullable();
            $table->unsignedBigInteger('media_sub_category_id')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_type')->nullable();
            $table->string('file_size')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('uploaded_on')->nullable();
            $table->string('file_url')->nullable();
            $table->string('year')->nullable();
            $table->enum('is_url', [0, 1])->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medias');
    }
};
