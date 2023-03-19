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
        Schema::create('causes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('display_photo_id')
                ->unsigned()
                ->nullable();
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('cause_categories')
                ->onDelete('CASCADE');
            $table->foreignId('sub_category_id')
                ->nullable()
                ->constrained('cause_sub_categories')
                ->onDelete('CASCADE');
            $table->text('cause_title')->nullable();
            $table->date('date_by_when_you_need')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->longText('cause_description')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('raising_for_someone_else')->nullable();
            $table->tinyInteger('apply_terms')->nullable();
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
        Schema::dropIfExists('causes');
    }
};
