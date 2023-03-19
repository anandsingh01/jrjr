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
        Schema::create('fund_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('profile')->nullable();
            $table->string('fName');
            $table->string('lName');
            $table->enum('status', ['0', '1'])->default('1');
            $table->string('number', 10)->unique();
            $table->string('email')->unique()->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode', 6)->nullable();
            $table->string('country')->nullable();
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
        Schema::dropIfExists('fund_users');
    }
};
