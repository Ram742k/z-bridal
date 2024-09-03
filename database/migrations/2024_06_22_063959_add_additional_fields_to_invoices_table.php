<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('invoices', function (Blueprint $table) {
        $table->string('cutomer_email')->nullable();
        $table->string('customer_city')->nullable();
        $table->string('payment_method')->nullable();
    });
}

public function down()
{
    Schema::table('invoices', function (Blueprint $table) {
        $table->dropColumn('cutomer_email');
        $table->dropColumn('customer_city');
        $table->dropColumn('payment_method');
    });
}

};
