<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resource_pages', function (Blueprint $table) {
            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Hero Section
            |--------------------------------------------------------------------------
            */
            $table->string('hero_eyebrow')->nullable();
            $table->text('hero_title')->nullable();
            $table->text('hero_description')->nullable();

            $table->string('search_placeholder')->nullable();

            // Comma separated
            // Example: Blister vs strip, Sealing issues, Food & Dairy, Recyclability
            $table->text('quick_tags')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Meta Stats
            |--------------------------------------------------------------------------
            */
            $table->string('meta_1_value')->nullable();
            $table->string('meta_1_label')->nullable();

            $table->string('meta_2_value')->nullable();
            $table->string('meta_2_label')->nullable();

            $table->string('meta_3_value')->nullable();
            $table->string('meta_3_label')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Featured Section Text
            |--------------------------------------------------------------------------
            */
            $table->string('featured_label')->nullable();

            // Optional: if selected, frontend can show this resource as featured
            $table->unsignedBigInteger('featured_resource_id')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Status
            |--------------------------------------------------------------------------
            */
            $table->boolean('status')->default(1);

            $table->timestamps();

            $table->index('featured_resource_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resource_pages');
    }
};