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
        Schema::create('user_logs', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->comment('Which User do this action');
            $table->string('ip_address')->nullable();
            $table->enum('action', ['create', 'update', 'delete', 'view'])->default('create');
            $table->string('detail')->nullable();
            $table->string('previous_detail')->nullable();
            $table->string('model')->nullable();
            $table->string('model_id')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_logs');
    }
};
