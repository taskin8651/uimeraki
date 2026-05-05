<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();

            $table->foreignId('resource_category_id')
                ->nullable()
                ->constrained('resource_categories')
                ->nullOnDelete();

            $table->string('title');
            $table->string('slug')->unique();

            $table->text('short_description')->nullable();
            $table->longText('content')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Card Type / UI
            |--------------------------------------------------------------------------
            */
            // Example: Guide / Technical Note / Case Study / FAQ / Download
            $table->string('type_label')->nullable();

            // Example: bi bi-journal-text
            $table->string('type_icon')->nullable();

            // Large icon on card
            // Example: bi bi-capsule-pill
            $table->string('main_icon')->nullable();

            // Example:
            // mres-card-media
            // mres-card-media-green
            // mres-card-media-blue
            // mres-card-media-gold
            // mres-card-media-purple
            // mres-card-media-teal
            $table->string('media_color_class')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Meta
            |--------------------------------------------------------------------------
            */
            // Example: 7 min read / PDF · 2 pages
            $table->string('read_time')->nullable();

            // Example: Pharma / India / Artwork / 1.2 MB
            $table->string('industry_or_meta')->nullable();

            // Comma separated
            // Example: Microns, Barrier, Forming
            $table->text('tags')->nullable();

            /*
            |--------------------------------------------------------------------------
            | CTA
            |--------------------------------------------------------------------------
            */
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Featured / Display
            |--------------------------------------------------------------------------
            */
            $table->boolean('is_featured')->default(0);
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();

            $table->index(['resource_category_id', 'status']);
            $table->index(['is_featured', 'status']);
            $table->index(['sort_order', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};