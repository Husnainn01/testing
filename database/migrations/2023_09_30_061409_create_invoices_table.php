<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Add user_id column
            $table->unsignedBigInteger('shipping_order_id');
            $table->foreign('shipping_order_id')->references('id')->on('shipping_orders')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users'); // Add this line for the reference
            $table->string('car_name');
            $table->string('car_brand');
            $table->string('car_location');
            $table->string('car_status');
            $table->decimal('offer_price', 30, 0);
            $table->string('offer_status');
            $table->decimal('agreed_price', 30, 0)->nullable();
            $table->text('remarks')->nullable();
            $table->string('service_type');
            $table->string('shipping_status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
