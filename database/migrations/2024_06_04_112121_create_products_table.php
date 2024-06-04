<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_number');
            $table->string('product_category');
            $table->bigInteger('product_price');
            $table->integer('product_stock');
            $table->text('product_description');
            $table->string('discount_percentage');
            $table->bigInteger('minimum_order_amount');
            $table->date('discount_period_start');
            $table->date('discount_period_end');
            $table->string('product_tag');
            $table->integer('product_weight');
            $table->integer('product_length');
            $table->integer('product_breadth');
            $table->integer('product_width');
            $table->string('product_images')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
