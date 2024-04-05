<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgreedPriceToTableName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qoutes', function (Blueprint $table) {
            $table->decimal('agreed_price', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qoutes', function (Blueprint $table) {
            $table->dropColumn('agreed_price');
        });
    }
}
