<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donate_funds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cause_id')->nullable();
            $table->integer('fund_user_id')->nullable();
            $table->double('donate_amount')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('payment_reference')->nullable();
            $table->string('razorpay_order_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('customer_ip')->nullable();
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
        Schema::dropIfExists('donate_funds');
    }
};
