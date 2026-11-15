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
            $table->foreignId('grahak_id')
      ->constrained('grahaks')
      ->cascadeOnDelete();

    $table->string('product_name');
    $table->string('product_brand')->nullable();
    $table->string('product_imei')->nullable();
    $table->string('product_hsn')->nullable();
    $table->decimal('product_price', 10, 2);
    $table->integer('product_quantity');
    $table->decimal('product_gst', 5, 2)->default(0)->nullable();
    $table->decimal('product_discount', 10, 2)->default(0)->nullable();
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
