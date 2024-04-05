<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qoutes', function (Blueprint $table) {
            $table->id();
            $table->string('car_id');
            $table->string('car_name');
            $table->integer('fob_price');
            $table->unsignedBigInteger('freight_id')->nullable();
            $table->unsignedBigInteger('insurance_id')->nullable();
            $table->unsignedBigInteger('inspection_id')->nullable();
            $table->integer('total_price');
            $table->integer('offer');
            $table->string('name');
            $table->string('email');
            $table->string('phone_no')->nullable();
            $table->string('country')->nullable();
            $table->string('type')->nullable();
            $table->string('gender')->nullable();
            $table->string('car_company_email')->nullable();
            $table->timestamps();

            $table->foreign('freight_id')->references('id')->on('freights');
            $table->foreign('insurance_id')->references('id')->on('insurances');
            $table->foreign('inspection_id')->references('id')->on('inspections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qoutes');
    }
}
