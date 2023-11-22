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
            $table->string('name'); // Cambiado a 'string'
            $table->string('description'); // Cambiado a 'string'
            $table->integer('price'); // Cambiado a 'integer'
            $table->integer('stock_quantity'); // Cambiado a 'integer'
            $table->foreignId('Category_id')->constrained('categories')->onDelete('cascade'); // Corregido
            $table->foreignId('Brand_id')->constrained('brands')->onDelete('cascade'); // Corregido
            $table->foreignId('Supplier_id')->constrained('suppliers')->onDelete('cascade'); // Corregido
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
