<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('image')->nullable();
            $table->string('phone')->nullable();
            $table->string('otp')->nullable();
            $table->string('device_type')->nullable();
            $table->text('device_token')->nullable();
            $table->string('verified_by')->nullable();
            $table->text('social_provider')->nullable();
            $table->text('social_token')->nullable();
            $table->text('social_id')->nullable();
            $table->boolean('status')->default(0)->nullable();
            $table->boolean('is_deactivate') ->default(0)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('image')->nullable();
            $table->string('phone')->nullable();
            $table->string('otp')->nullable();
            $table->string('device_type')->nullable();
            $table->text('device_token')->nullable();
            $table->string('verified_by')->nullable();
            $table->text('social_provider')->nullable();
            $table->text('social_token')->nullable();
            $table->text('social_id')->nullable();
            $table->boolean('status')->nullable()->default(0);
            $table->boolean('is_deactivate')->nullable()->default(0);
        });
    }
}
