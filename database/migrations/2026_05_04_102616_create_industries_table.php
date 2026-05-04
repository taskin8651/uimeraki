<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('industries', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();

            $table->text('description')->nullable();

            // Example: bi bi-capsule-pill / fas fa-pills
            $table->string('badge_icon')->nullable();

            // Example: Pharma
            $table->string('badge_text')->nullable();

            // Comma separated values
            // Example: Blister foils, Strip packs, Barrier, Traceability
            $table->text('tags')->nullable();

            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();

            $table->index(['sort_order', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('industries');
    }
};