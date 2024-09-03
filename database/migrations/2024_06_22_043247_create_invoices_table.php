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
            $table->string('invoice_number')->unique();
            $table->date('invoice_date');
            $table->string('customer_name');
            $table->string('customer_mobile');
            $table->unsignedBigInteger('sales_person_id');
            $table->string('sales_person_name');
            $table->unsignedBigInteger('service_person_id');
            $table->string('service_person_name');
            $table->decimal('sub_total', 10, 2);
            $table->decimal('tax_percentage', 5, 2);
            $table->decimal('total_tax', 10, 2);
            $table->decimal('total', 10, 2);
            $table->timestamps();

            $table->foreign('sales_person_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('service_person_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}