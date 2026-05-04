<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('industry_pages', function (Blueprint $table) {
            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Hero Section
            |--------------------------------------------------------------------------
            */
            $table->string('hero_eyebrow')->nullable();
            $table->string('hero_title')->nullable();
            $table->string('hero_highlight')->nullable();
            $table->text('hero_description')->nullable();

            // Comma separated values
            // Example: Pharma, Food & Dairy, Cosmetics, Confectionery
            $table->text('hero_chips')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Industries Section
            |--------------------------------------------------------------------------
            */
            $table->string('section_eyebrow')->nullable();
            $table->string('section_title')->nullable();
            $table->text('section_description')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Status
            |--------------------------------------------------------------------------
            */
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('industry_pages');
    }
};