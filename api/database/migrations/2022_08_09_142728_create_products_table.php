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
        Schema::dropIfExists('products');
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id')->unsigned()->autoIncrement();
            $table->string('name');
            $table->string('price');
            $table->integer('category')->comment("1: Keyboard, 2: Switch, 3: Keycap, 4: Other");
            $table->integer('sold')->unsigned()->default(0);
            $table->text('description')->nullable();
            $table->string('brand')->nullable();
            $table->integer('in_stock')->unsigned();
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
        Schema::dropIfExists('products');
    }
};
