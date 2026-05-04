<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('capabilities', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('description')->nullable();

            $table->string('badge_icon')->nullable();
            $table->string('badge_text')->nullable();

            // Comma separated values
            // Example: 6 colors, Register, Brand-safe
            $table->text('tags')->nullable();

            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();

            $table->index(['sort_order', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('capabilities');
    }
};