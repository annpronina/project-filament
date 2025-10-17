<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('price_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('shop_id')->constrained('shops')->onDelete('cascade');
            $table->decimal('price', 10, 2);
            $table->timestamp('timestamp');
            $table->timestamps();

            $table->index(['product_id', 'shop_id', 'timestamp']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('price_history');
    }
};
