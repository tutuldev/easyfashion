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
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // Optional for guest users
            $table->string('customer_name'); // Combines first_name and last_name for simplicity
            $table->string('customer_phone');
            $table->string('customer_email')->nullable();
            $table->text('delivery_address'); // Combines street, apartment, city
            $table->string('district'); // For shipping cost calculation
            $table->string('postcode')->nullable();
            $table->text('order_notes')->nullable();

            $table->json('product_details'); // Store product name, price, quantity, size, color in JSON
            $table->decimal('subtotal', 10, 2);
            $table->decimal('shipping_cost', 10, 2);
            $table->decimal('total', 10, 2);

            $table->string('payment_method'); // e.g., cash_on_delivery, mobile_banking
            $table->string('payment_status')->default('pending'); // pending, paid, failed, refunded
            $table->string('order_status')->default('pending'); // pending, processing, shipped, delivered, cancelled

            $table->timestamps();
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

