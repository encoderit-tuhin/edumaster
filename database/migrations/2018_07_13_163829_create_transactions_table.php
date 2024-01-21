<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('trans_date');
            $table->integer('account_id');
            $table->string('trans_type', 20);
            $table->decimal('amount', 8, 2);
            $table->decimal('discount', 20, 4)->default(0);
            $table->string('discount_type')->nullable();
            $table->decimal('paid_amount', 8, 2)->default(0);
            $table->decimal('due_amount', 8, 2)->default(0);
            $table->string('payment_status')->default('due')->nullable();
            $table->string('dr_cr', 2);
            $table->integer('chart_id');
            $table->integer('payee_payer_id')->nullable();
            $table->integer('payment_method_id')->nullable();
            $table->integer('create_user_id');
            $table->integer('update_user_id')->nullable();
            $table->string('reference', 100)->nullable();
            $table->text('attachment')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}