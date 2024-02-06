<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('name')->nullable();
            $table->date('date')->nullable();
            $table->date('expiration_date')->nullable();
            $table->string('exam')->nullable();
            $table->string('interaction')->nullable();
            $table->string('length')->nullable();
            $table->string('credit_earn')->nullable();
            $table->string('module')->nullable();
            $table->string('cal_length')->nullable();
            $table->text('description')->nullable();
            $table->text('sub_title')->nullable();
            $table->string('status')->nullable()->default(0);
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
        Schema::dropIfExists('courses');
    }
}
