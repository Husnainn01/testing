<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTtDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('tt_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shipping_order_id');
            $table->string('document_path');
            $table->text('details')->nullable();
            $table->timestamps();

            $table->foreign('shipping_order_id')
                  ->references('id')
                  ->on('shipping_orders')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tt_documents');
    }
}
