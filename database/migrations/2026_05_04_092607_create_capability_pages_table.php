<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('capability_pages', function (Blueprint $table) {
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

            $table->string('hero_kpi_1_value')->nullable();
            $table->string('hero_kpi_1_label')->nullable();

            $table->string('hero_kpi_2_value')->nullable();
            $table->string('hero_kpi_2_label')->nullable();

            $table->string('hero_kpi_3_value')->nullable();
            $table->string('hero_kpi_3_label')->nullable();

            // Comma separated values
            // Example: HSL / Primers, 50–1200mm widths, Defect logs, Batch traceability
            $table->text('hero_chips')->nullable();

            $table->string('hero_visual_label')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Specs Section
            |--------------------------------------------------------------------------
            */
            $table->string('specs_eyebrow')->nullable();
            $table->string('specs_title')->nullable();
            $table->text('specs_description')->nullable();
            $table->string('specs_button_text')->nullable();
            $table->string('specs_button_link')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Process Section
            |--------------------------------------------------------------------------
            */
            $table->string('process_eyebrow')->nullable();
            $table->string('process_title')->nullable();
            $table->text('process_description')->nullable();

            /*
            |--------------------------------------------------------------------------
            | CTA Section
            |--------------------------------------------------------------------------
            */
            $table->string('cta_eyebrow')->nullable();
            $table->string('cta_title')->nullable();
            $table->text('cta_description')->nullable();

            // Comma separated values
            $table->text('cta_points')->nullable();

            // Comma separated values
            $table->text('cta_trust_chips')->nullable();

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
        Schema::dropIfExists('capability_pages');
    }
};