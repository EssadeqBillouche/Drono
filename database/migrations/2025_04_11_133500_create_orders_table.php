// 2024_04_08_000003_create_orders_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained();
            $table->string('order_number')->unique();
            $table->decimal('total_amount', 10, 2);
            $table->decimal('delivery_fee', 10, 2);
            $table->enum('status', [
                'pending', 'confirmed', 'preparing',
                'in_transit', 'delivered', 'cancelled'
            ])->default('pending');
            $table->string('delivery_address');
            $table->json('payment_details');
            $table->timestamp('estimated_delivery_time')->nullable();
            $table->json('drone_tracking_data')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
