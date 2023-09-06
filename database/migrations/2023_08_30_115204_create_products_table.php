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
            $table->string('name');
            $table->enum('unit', ['Qty', 'Ltr', 'KG', 'Meter']);
            //$table->string('category');
            $table->unsignedBigInteger('category')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('percentage', 5, 2)->nullable();
            $table->decimal('discount', 10, 2)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->decimal('tax_percentage', 5, 2)->nullable();
            $table->decimal('tax_amount', 10, 2)->nullable();
            $table->integer('stock_quantity')->default(0);
            $table->decimal('net_price', 10, 2);
            $table->string('product_id');
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->index('name');
            $table->index('price');
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
