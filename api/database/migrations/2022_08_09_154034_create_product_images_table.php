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
        Schema::dropIfExists('product_images');
        Schema::create('product_images', function (Blueprint $table) {
            $table->id('image_id')->unsigned()->autoIncrement();
            $table->unsignedBigInteger('product_id');
            $table->string('image_url');
            $table->boolean('is_thumbnail')->default(false);
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
        Schema::dropIfExists('product_images');
    }
};
