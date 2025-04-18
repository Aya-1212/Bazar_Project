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
        Schema::create('book_order', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("qauntity");
            $table->decimal("sub_total", 8, 2);
            $table->foreignId('book_id')->constrained('books')->onDelete('cascade');
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_order');
    }
};
