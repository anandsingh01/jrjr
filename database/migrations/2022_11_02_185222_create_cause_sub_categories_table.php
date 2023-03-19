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
        Schema::create('cause_sub_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('cause_categories')
                ->onDelete('CASCADE');
            $table->string('sub_category');
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
        Schema::dropIfExists('cause_sub_categories');
    }
};
