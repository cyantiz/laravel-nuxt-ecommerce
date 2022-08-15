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
        Schema::dropIfExists('orders');
        Schema::create('orders', function (Blueprint $table) {
            $table->id("order_id")->unsigned()->autoIncrement();
            $table->unsignedBigInteger("customer_id");
            $table->string("to_name");
            $table->string("to_address");
            $table->string("to_province_code");
            $table->string("to_district_code");
            $table->string("to_commune_code");
            $table->string("note")->nullable();
            $table->string("status")->default("pending")->comment("pending, processing, shipped, delivered, canceled");
            $table->foreign("customer_id")->references("customer_id")->on("customers")->onDelete('cascade');

            //            
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
        Schema::dropIfExists('orders');
    }
};
