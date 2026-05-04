<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quality_processes', function (Blueprint $table) {
            $table->id();

            // Example: bi bi-box-arrow-in-down / fas fa-box
            $table->string('icon')->nullable();

            $table->string('title');
            $table->text('description')->nullable();

            // Comma separated values
            // Example: Visual & surface checks, Gauge / thickness sampling, Documentation review
            $table->text('points')->nullable();

            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();

            $table->index(['sort_order', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quality_processes');
    }
};