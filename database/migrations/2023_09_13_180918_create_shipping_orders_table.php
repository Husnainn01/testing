<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('offer_id');
            $table->string('service');
            $table->unsignedBigInteger('country');
            $table->unsignedBigInteger('city');
            $table->unsignedBigInteger('container_port');
            $table->string('consignee_tab');
            $table->string('receiver_tab');
            $table->unsignedBigInteger('consignee_id');
            $table->string('default_name');
            $table->string('default_company_name');
            $table->string('default_email');
            $table->string('default_phone_number');
            $table->string('default_phone_2')->nullable();
            $table->string('default_address');
            $table->unsignedBigInteger('receiver_id');
            $table->string('receiver_default_name');
            $table->string('receiver_default_company_name');
            $table->string('receiver_default_email');
            $table->string('receiver_default_phone_number');
            $table->string('receiver_default_phone_2')->nullable();
            $table->string('receiver_default_address');
            $table->boolean('deregistration_service')->default(0);
            $table->boolean('english_export_service')->default(0);
            $table->boolean('photo_service')->default(0);
            $table->boolean('ss_custom_photo_service')->default(0);
            $table->boolean('ss_custom_inspection_service')->default(0);
            $table->boolean('ss_custom_cleaning_service')->default(0);
            $table->timestamps();
            
            $table->foreign('offer_id')->references('id')->on('qoutes');
            $table->foreign('country')->references('id')->on('listing_locations');
            $table->foreign('city')->references('id')->on('cities');
            $table->foreign('container_port')->references('id')->on('ports');
        });
    }

    public function down()
    {
        Schema::dropIfExists('shipping_orders');
    }
}
