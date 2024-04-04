<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingOrderOptionServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_order_option_service', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shipping_order_id');
            $table->unsignedBigInteger('option_service_id');
            // Add any additional columns specific to this relationship here
            $table->timestamps();

            $table->foreign('shipping_order_id')->references('id')->on('shipping_orders')->onDelete('cascade');
            $table->foreign('option_service_id')->references('id')->on('option_services')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('shipping_order_option_service');
    }
}
