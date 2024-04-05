<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVesselNameToDocuments extends Migration
{
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->string('vessel_name');
        });
    }

    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn('vessel_name');
        });
    }
}
