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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->mediumText('description');
            $table->string('author');
            $table->decimal('price',8,2);
            $table->string('discount');
            $table->decimal('price_after_discount',8,2);
            $table->integer('stock_quantity');
            $table->foreignId('category_id')->constrained('categories')->onDelete('restrict');
            $table->foreignId('publisher_id')->constrained('publishers')->onDelete('restrict');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
