<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('shop_id')->constrained('shops')->onDelete('cascade');
            $table->decimal('price', 10, 2);
            $table->integer('stock')->default(0);
            $table->timestamp('last_updated')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();

            $table->unique(['product_id', 'shop_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('offers');
    }
};
