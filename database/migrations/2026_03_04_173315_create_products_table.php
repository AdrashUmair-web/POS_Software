<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('company_id');

            $table->string('name');
            $table->integer('pieces')->default(0);
            $table->decimal('unit_quantity', 10, 2)->nullable();

            $table->decimal('cost_price', 15, 2)->default(0);
            $table->decimal('sale_price', 15, 2)->default(0);

            $table->boolean('is_active')->default(true);
            $table->boolean('allow_discount')->default(false);

            $table->integer('alert_stock')->default(0);

            $table->timestamps();

            // Foreign Key
            $table->foreign('company_id')
                  ->references('id')
                  ->on('companies')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};