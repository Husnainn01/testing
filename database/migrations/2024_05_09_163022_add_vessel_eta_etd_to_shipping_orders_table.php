<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVesselEtaEtdToShippingOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shipping_orders', function (Blueprint $table) {
            $table->string('vessel_name')->nullable();
            $table->dateTime('eta_date')->nullable();
            $table->dateTime('etd_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shipping_orders', function (Blueprint $table) {
            $table->dropColumn('vessel_name');
            $table->dropColumn('eta_date');
            $table->dropColumn('etd_date');
        });
    }
}
