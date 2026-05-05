<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Basic Site Info
            |--------------------------------------------------------------------------
            */
            $table->string('site_name')->nullable();
            $table->string('site_title')->nullable();
            $table->text('tagline')->nullable();
            $table->text('footer_description')->nullable();
            $table->string('copyright_text')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Contact Information
            |--------------------------------------------------------------------------
            */
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('alternate_phone')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->text('address')->nullable();

            // Google map embed URL ya normal map link dono yahi me save hoga
            $table->text('map_url')->nullable();

            $table->string('working_hours')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Header / Topbar
            |--------------------------------------------------------------------------
            */
            $table->boolean('show_topbar')->default(1);

            // Comma separated
            // Example: Quality, Customization, On-time Delivery, Sustainability
            $table->text('topbar_pills')->nullable();

            $table->string('header_button_text')->nullable();
            $table->string('header_button_link')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Footer
            |--------------------------------------------------------------------------
            */
            $table->string('newsletter_title')->nullable();
            $table->text('newsletter_text')->nullable();

            $table->string('privacy_link')->nullable();
            $table->string('terms_link')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Social Links
            |--------------------------------------------------------------------------
            */
            $table->string('linkedin_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('whatsapp_url')->nullable();

            /*
            |--------------------------------------------------------------------------
            | SEO Settings
            |--------------------------------------------------------------------------
            */
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('canonical_url')->nullable();
            $table->string('robots')->nullable();

            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Scripts
            |--------------------------------------------------------------------------
            */
            $table->longText('header_scripts')->nullable();
            $table->longText('footer_scripts')->nullable();

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
        Schema::dropIfExists('website_settings');
    }
};