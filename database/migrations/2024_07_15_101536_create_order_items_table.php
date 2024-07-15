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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->uuid('order_id');
            $table->uuid('product_id');
            $table->integer('quantity');
            $table->decimal('base_price', 16, 2)->default(0.00);
            $table->decimal('base_total', 16, 2)->default(0.00);
            $table->decimal('discount_amount', 16, 2)->default(0.00);
            $table->decimal('discount_percent', 16, 2)->default(0.00);
            $table->decimal('sub_total', 16, 2)->default(0.00);
            $table->string('product_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
