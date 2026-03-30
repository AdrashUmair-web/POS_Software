<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('purchase_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('product_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('company_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->integer('boxes')->default(0); // Quantity (Boxes)

            $table->decimal('unit_quantity', 10, 2)->nullable();

            $table->integer('total_pieces')->default(0);

            $table->decimal('purchase_price', 15, 2)->default(0);
            $table->decimal('sale_price', 15, 2)->default(0);

            $table->decimal('discount', 15, 2)->default(0);

            $table->decimal('profit_percentage', 8, 2)->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchase_items');
    }
};