<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_pages', function (Blueprint $table) {
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
            // Example: Commercial & Industrial, Pharmaceutical, Food & Dairy
            $table->text('hero_chips')->nullable();

            $table->string('hero_stat_1_value')->nullable();
            $table->string('hero_stat_1_label')->nullable();

            $table->string('hero_stat_2_value')->nullable();
            $table->string('hero_stat_2_label')->nullable();

            $table->string('hero_stat_3_value')->nullable();
            $table->string('hero_stat_3_label')->nullable();

            $table->text('hero_footnote')->nullable();

            $table->string('hero_tag_1')->nullable();
            $table->string('hero_tag_2')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Journey Section Intro
            |--------------------------------------------------------------------------
            */
            $table->string('journey_eyebrow')->nullable();
            $table->string('journey_title')->nullable();
            $table->text('journey_description_1')->nullable();
            $table->text('journey_description_2')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Mission Section
            |--------------------------------------------------------------------------
            */
            $table->string('mission_eyebrow')->nullable();
            $table->string('mission_title')->nullable();
            $table->text('mission_description')->nullable();

            // Comma separated values
            $table->text('mission_points')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Vision Section
            |--------------------------------------------------------------------------
            */
            $table->string('vision_eyebrow')->nullable();
            $table->string('vision_title')->nullable();
            $table->text('vision_description')->nullable();

            // Comma separated values
            $table->text('vision_points')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Why Section
            |--------------------------------------------------------------------------
            */
            $table->string('why_eyebrow')->nullable();
            $table->string('why_title')->nullable();
            $table->text('why_description')->nullable();

            // Comma separated values
            $table->text('why_micro_points')->nullable();

            /*
            |--------------------------------------------------------------------------
            | CTA Section
            |--------------------------------------------------------------------------
            */
            $table->string('cta_title')->nullable();
            $table->text('cta_description')->nullable();
            $table->string('cta_button_text')->nullable();
            $table->string('cta_button_link')->nullable();

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
        Schema::dropIfExists('about_pages');
    }
};