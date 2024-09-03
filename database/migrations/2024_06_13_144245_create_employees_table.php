<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birthday');
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->string('address_number');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_number');
            $table->integer('years_of_experience');
            $table->string('position');
            $table->date('date_of_joining');
            $table->string('profile_image');
            $table->string('id_proof');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
