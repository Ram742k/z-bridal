<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bridal_bookings', function (Blueprint $table) {
            $table->id('bookid');
            $table->string('bridal_name');
            $table->string('cell_no1');
            $table->string('cell_no2')->nullable();
            $table->text('address')->nullable();
            $table->enum('function', ['engagement', 'marriage', 'others']);
            $table->date('function_date');
            $table->time('time');
            $table->string('place')->nullable();
            $table->enum('makeup', ['hd', 'hdpro', 'air_brush', 'other']);
            $table->boolean('side_makeup')->default(false);
            $table->boolean('jewalls')->default(false);
            $table->boolean('flowers')->default(false);
            $table->decimal('total_amount', 8, 2);
            $table->decimal('advance_amount', 8, 2)->nullable();
            $table->decimal('balance', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bridal_bookings');
    }
};
