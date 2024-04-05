<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestedCarsTable extends Migration
{
    public function up()
    {
        Schema::create('requested_cars', function (Blueprint $table) {
            $table->id();
            $table->string('car_name');
            $table->string('car_model');
            $table->integer('year');
            $table->integer('mileage');
            $table->string('engine');
            $table->string('transmission');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('requested_cars');
    }
}
