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
        Schema::dropIfExists('keyboards');
        Schema::create('keyboards', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->primary();
            $table->string('key_layout')->nullable();
            $table->string('switch_name')->nullable();
            $table->string('keycap')->nullable();
            $table->boolean('hot_swappable')->nullable();
            $table->string('connections_type')->nullable();
            $table->string('accessories')->nullable();
            $table->string('operating_system')->nullable();
            $table->unsignedDouble('weight')->nullable();
            $table->unsignedDouble('length')->nullable();
            $table->unsignedDouble('width')->nullable();
            $table->unsignedDouble('depth')->nullable();
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
        Schema::dropIfExists('keyboards');
    }
};
