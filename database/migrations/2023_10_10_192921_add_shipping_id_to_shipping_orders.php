<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShippingIdToShippingOrders extends Migration
{
    public function up()
    {
        Schema::table('shipping_orders', function (Blueprint $table) {
            $table->string('shipping_id')->after('id');
        });
    }
    public function down()
    {
        Schema::table('shipping_orders', function (Blueprint $table) {
            $table->dropColumn('shipping_id');
        });
    }
}
