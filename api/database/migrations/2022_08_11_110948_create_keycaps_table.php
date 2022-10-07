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
        Schema::dropIfExists('keycaps');
        Schema::create('keycaps', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->unsignedBigInteger('product_id')->primary();
            $table->string('profile')->nullable();
            $table->string('material')->nullable();
            $table->timestamps();
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keycaps');
    }
};
