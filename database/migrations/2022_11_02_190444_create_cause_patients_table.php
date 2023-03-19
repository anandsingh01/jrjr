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
        Schema::create('cause_patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('cause_id')
                ->nullable()
                ->constrained('causes')
                ->onDelete('CASCADE');
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->bigInteger('mobile_no')->nullable();
            $table->bigInteger('whatapp_no')->nullable();
            $table->string('email')->nullable();
            $table->string('relation_with_patient')->nullable();
            $table->mediumText('address')->nullable();
            $table->string('locality')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->integer('pincode')->nullable();
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
        Schema::dropIfExists('cause_patients');
    }
};
