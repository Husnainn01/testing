<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAgreedPricePrecisionInQoutesTable extends Migration
{
    public function up()
    {
        Schema::table('qoutes', function (Blueprint $table) {
            $table->decimal('agreed_price', 30, 0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // public function down()
    // {
    //     Schema::table('qoutes', function (Blueprint $table) {
    //         $table->dropColumn('agreed_price');
    //     });
    // }
}
