<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('delivery', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->string('drone_id');
            $table->decimal('start_lat', 10, 8);
            $table->decimal('start_lng', 11, 8);
            $table->decimal('end_lat', 10, 8);
            $table->decimal('end_lng', 11, 8);
            $table->decimal('distance_miles', 8, 2);
            $table->integer('estimated_duration_minutes');
            $table->timestamp('scheduled_delivery_time');
            $table->timestamp('actual_delivery_time')->nullable();
            $table->json('route_waypoints')->nullable(); // Stores the route path coordinates
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('delivery');
    }
};
