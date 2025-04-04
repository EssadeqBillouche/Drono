<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('user_id'); // Foreign key to users
            $table->string('type'); // e.g., 'client_delivery', 'seller_store'
            $table->string('street'); // Street address
            $table->string('city');
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country');
            $table->decimal('latitude', 10, 7)->nullable(); // For drone coordinates
            $table->decimal('longitude', 10, 7)->nullable(); // For drone coordinates
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
