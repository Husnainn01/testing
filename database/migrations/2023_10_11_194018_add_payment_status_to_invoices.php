<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentStatusToInvoices extends Migration
{
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->enum('payment_status', ['full', 'partial', 'unpaid'])->default('unpaid');
        });
    }

    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('payment_status');
        });
    }
}
