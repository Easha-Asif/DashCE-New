<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('sender_id')->nullable();
            $table->integer('trigger_id')->nullable();
            $table->string('trigger_type')->nullable();
            $table->string('job_id')->nullable();
            $table->string('source')->nullable();
            $table->string('title');
            $table->text('message')->nullable();
            $table->string('device_type')->nullable();
            $table->string('success')->nullable();
            $table->string('failure')->nullable();
            $table->string('image')->nullable();
            $table->string('is_read')->nullable();
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
        Schema::dropIfExists('notifications');
    }
}
