<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('customers');
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_id')->unsigned()->autoIncrement();
            $table->string('email')->unique();
            $table->string('name');
            $table->string('phone')->unique()->nullable();
            $table->string('address')->nullable();
            $table->string('province_code')->nullable();
            $table->string('district_code')->nullable();
            $table->string('commune_code')->nullable();
            $table->timestamps();
            $table->foreign('email')->references('email')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
