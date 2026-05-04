<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quality_pages', function (Blueprint $table) {
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
            // Example: Batch traceability, In-process QA, Certificates on request
            $table->text('hero_chips')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Hero Metrics
            |--------------------------------------------------------------------------
            */
            $table->string('hero_kpi_1_value')->nullable();
            $table->string('hero_kpi_1_label')->nullable();

            $table->string('hero_kpi_2_value')->nullable();
            $table->string('hero_kpi_2_label')->nullable();

            $table->string('hero_kpi_3_value')->nullable();
            $table->string('hero_kpi_3_label')->nullable();

            /*
            |--------------------------------------------------------------------------
            | QA Snapshot Card
            |--------------------------------------------------------------------------
            */
            $table->string('snapshot_label')->nullable();
            $table->string('snapshot_badge')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Floating Badge
            |--------------------------------------------------------------------------
            */
            $table->string('floating_badge_icon')->nullable();
            $table->string('floating_badge_title')->nullable();
            $table->string('floating_badge_text')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Pillar Section
            |--------------------------------------------------------------------------
            */
            $table->string('pillar_eyebrow')->nullable();
            $table->string('pillar_title')->nullable();
            $table->text('pillar_description')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Process Section
            |--------------------------------------------------------------------------
            */
            $table->string('process_eyebrow')->nullable();
            $table->string('process_title')->nullable();
            $table->text('process_description')->nullable();
            $table->string('process_note')->nullable();

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
        Schema::dropIfExists('quality_pages');
    }
};