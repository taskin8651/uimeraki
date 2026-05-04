<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('capability_processes', function (Blueprint $table) {
            $table->id();

            // Example: bi bi-chat-dots, fas fa-comments
            $table->string('icon')->nullable();

            $table->string('title');
            $table->text('description')->nullable();

            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();

            $table->index(['sort_order', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('capability_processes');
    }
};