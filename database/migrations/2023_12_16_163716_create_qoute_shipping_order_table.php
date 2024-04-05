<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQouteShippingOrderTable extends Migration
{
    public function up()
    {
        Schema::table('shipping_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('offer_id')->nullable()->change();
        });
        Schema::create('shipping_order_qoute', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shipping_order_id');
            $table->unsignedBigInteger('qoute_id');
            $table->timestamps();
            $table->foreign('shipping_order_id')->references('id')->on('shipping_orders')->onDelete('cascade');
            $table->foreign('qoute_id')->references('id')->on('qoutes')->onDelete('cascade');
        });
    }

    public function down()
        {
            Schema::dropIfExists('shipping_order_qoute');

    }
}
