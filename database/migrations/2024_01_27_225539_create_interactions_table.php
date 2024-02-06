<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteractionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interactions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('course_id')->nullable();
            $table->integer('module_id')->nullable();
            $table->integer('mini_module_id')->nullable();
            $table->string('name')->nullable();
            $table->string('badge')->nullable();
            $table->string('type')->nullable();
            $table->string('time')->nullable();
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
        Schema::dropIfExists('interactions');
    }
}
