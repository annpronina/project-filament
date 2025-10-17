<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('import_log', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained('shops')->onDelete('cascade');
            $table->string('file_type');
            $table->timestamp('imported_at');
            $table->json('errors')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('import_log');
    }
};
