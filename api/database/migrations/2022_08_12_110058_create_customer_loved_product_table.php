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
        Schema::dropIfExists("customer_loved_product");
        Schema::create('customer_loved_product', function (Blueprint $table) {
            // pivot table for customer and product
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('product_id');
            $table->primary(['customer_id', 'product_id']);
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onDelete('cascade');
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('customer_loved_product');
    }
};
