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
        Schema::dropIfExists("product_tag");
        Schema::create('product_tag', function (Blueprint $table) {
            $table->primary(['product_id', 'tag_id']);
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
            $table->foreign('tag_id')->references('tag_id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_tag');
    }
};
