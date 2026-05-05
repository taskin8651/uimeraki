<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class WebsiteSetting extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'site_name',
        'site_title',
        'tagline',
        'footer_description',
        'copyright_text',

        'email',
        'phone',
        'alternate_phone',
        'whatsapp_number',
        'address',
        'map_url',
        'working_hours',

        'show_topbar',
        'topbar_pills',
        'header_button_text',
        'header_button_link',

        'newsletter_title',
        'newsletter_text',
        'privacy_link',
        'terms_link',

        'linkedin_url',
        'twitter_url',
        'instagram_url',
        'facebook_url',
        'youtube_url',
        'whatsapp_url',

        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'robots',
        'og_title',
        'og_description',

        'header_scripts',
        'footer_scripts',

        'status',
    ];

    protected $casts = [
        'show_topbar' => 'boolean',
        'status'      => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('logo')
            ->singleFile();

        $this
            ->addMediaCollection('footer_logo')
            ->singleFile();

        $this
            ->addMediaCollection('favicon')
            ->singleFile();

        $this
            ->addMediaCollection('og_image')
            ->singleFile();
    }

    public function getLogoUrlAttribute()
    {
        return $this->getFirstMediaUrl('logo')
            ?: asset('assets/img/logo.png');
    }

    public function getFooterLogoUrlAttribute()
    {
        return $this->getFirstMediaUrl('footer_logo')
            ?: $this->logo_url;
    }

    public function getFaviconUrlAttribute()
    {
        return $this->getFirstMediaUrl('favicon')
            ?: asset('assets/img/favicon.png');
    }

    public function getOgImageUrlAttribute()
    {
        return $this->getFirstMediaUrl('og_image')
            ?: $this->logo_url;
    }

    public function getTopbarPillsArrayAttribute(): array
    {
        return $this->stringToArray($this->topbar_pills);
    }

    private function stringToArray($value): array
    {
        if (!$value) {
            return [];
        }

        return array_filter(array_map('trim', explode(',', $value)));
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}