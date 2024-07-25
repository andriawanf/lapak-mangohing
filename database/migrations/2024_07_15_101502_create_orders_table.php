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
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('order_number')->unique();
            $table->uuid('user_id');
            $table->string('status')->default('pending');
            $table->dateTime('order_date');
            $table->dateTime('payment_due');
            $table->string('payment_status')->default('pending');
            $table->decimal('base_total_price', 16, 2)->default(0.00);
            $table->decimal('discount_amount', 16, 2)->default(0.00);
            $table->decimal('discount_percent', 16, 2)->default(0.00);
            $table->decimal('grand_total', 16, 2)->default(0.00);
            $table->decimal('shipping_cost', 16, 2)->default(0.00);
            $table->string('shipping_method')->nullable();
            $table->string('purchase_option')->nullable();
            $table->text('customer_note')->nullable();
            $table->string('customer_name');
            $table->string('customer_address')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_country')->nullable();
            $table->string('customer_province')->nullable();
            $table->string('customer_city')->nullable();
            $table->string('customer_regency')->nullable();
            $table->string('customer_district')->nullable();
            $table->integer('customer_postcode')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
