<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToShippingOrders extends Migration
{
    public function up()
    {
        Schema::table('shipping_orders', function (Blueprint $table) {
            $table->enum('status', ['pending', 'approved', 'cancelled'])->default('pending');
        });
    }

    public function down()
    {
        Schema::table('shipping_orders', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
