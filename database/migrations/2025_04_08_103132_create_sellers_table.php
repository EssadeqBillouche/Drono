<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sellers', /**
         * Define the schema for creating the stores table.
         *
         * @param Blueprint $table The blueprint instance used to define the table's schema.
         * @return void
         */ function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('store_name');
            $table->string('store_profile')->nullable();
            $table->string('store_background_image')->nullable();
            $table->string('store_address');
            $table->string('tax_id')->nullable();
            $table->text('description')->nullable();
            $table->enum('store_category', [
                'pharmacy',
                'grocery',
                'electronics',
                'fashion',
                'restaurant',
                'beauty',
                'home_garden',
                'sports',
                'books',
                'toys'
            ])->after('store_name');
            $table->string('contact_phone');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
