<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('type')->nullable();
            $table->date('date')->nullable();
            $table->date('expiration_date')->nullable();
            $table->text('license')->nullable();
            $table->string('name')->nullable();
            $table->string('brokerage_name')->nullable();
            $table->integer('Brokerage_id')->nullable();
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
        Schema::dropIfExists('licenses');
    }
}
