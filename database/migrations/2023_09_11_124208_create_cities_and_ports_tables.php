<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesAndPortsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('country_id');
            $table->timestamps();
        });

        Schema::create('ports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('country_id');
            $table->timestamps();
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->foreign('country_id')
                  ->references('id')
                  ->on('listing_locations')
                  ->onDelete('cascade'); // Define the desired cascade action
        });

        Schema::table('ports', function (Blueprint $table) {
            $table->foreign('country_id')
                  ->references('id')
                  ->on('listing_locations')
                  ->onDelete('cascade'); // Define the desired cascade action
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('company_name')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
        Schema::dropIfExists('ports');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('company_name');
        });
    }
}
