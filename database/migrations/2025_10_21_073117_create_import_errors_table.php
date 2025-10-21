<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('import_errors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('import_log_id')->constrained('import_log')->onDelete('cascade');
            $table->string('message');
            $table->string('code')->nullable(); // error code
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('errors');
    }
};
