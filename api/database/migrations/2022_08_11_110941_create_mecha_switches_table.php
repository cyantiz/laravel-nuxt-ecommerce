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
        Schema::dropIfExists('mecha_switches');
        Schema::create('mecha_switches', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->primary();
            $table->string('type')->comment("linear, tactile, clicky")->nullable();
            $table->string('operating_force')->nullable();
            $table->string('total_travel')->nullable();
            $table->string('pre_travel')->nullable();
            $table->string('tactile_position')->nullable();
            $table->string('tactile_force')->nullable();
            $table->boolean('pre_lubed')->nullable();
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
        Schema::dropIfExists('mecha_switches');
    }
};
