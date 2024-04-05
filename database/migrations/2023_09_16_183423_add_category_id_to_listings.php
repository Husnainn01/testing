<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToListings extends Migration
{
    public function up()
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->boolean('is_new_arrival')->default(false);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->dropColumn('is_new_arrival');
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }  
}
