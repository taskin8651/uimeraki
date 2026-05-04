<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class CapabilityPage extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'hero_eyebrow',
        'hero_title',
        'hero_highlight',
        'hero_description',

        'hero_kpi_1_value',
        'hero_kpi_1_label',
        'hero_kpi_2_value',
        'hero_kpi_2_label',
        'hero_kpi_3_value',
        'hero_kpi_3_label',

        'hero_chips',
        'hero_visual_label',

        'specs_eyebrow',
        'specs_title',
        'specs_description',
        'specs_button_text',
        'specs_button_link',

        'process_eyebrow',
        'process_title',
        'process_description',

        'cta_eyebrow',
        'cta_title',
        'cta_description',
        'cta_points',
        'cta_trust_chips',
        'cta_button_text',
        'cta_button_link',

        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('capability_hero_image')
            ->singleFile();

        $this
            ->addMediaCollection('capability_float_image_1')
            ->singleFile();

        $this
            ->addMediaCollection('capability_float_image_2')
            ->singleFile();
    }

    public function getHeroImageUrlAttribute()
    {
        return $this->getFirstMediaUrl('capability_hero_image')
            ?: asset('assets/img/capabilities/hero.png');
    }

    public function getFloatImage1UrlAttribute()
    {
        return $this->getFirstMediaUrl('capability_float_image_1')
            ?: asset('assets/img/capabilities/printing.png');
    }

    public function getFloatImage2UrlAttribute()
    {
        return $this->getFirstMediaUrl('capability_float_image_2')
            ?: asset('assets/img/capabilities/slitting.png');
    }

    public function getHeroChipsArrayAttribute(): array
    {
        return $this->stringToArray($this->hero_chips);
    }

    public function getCtaPointsArrayAttribute(): array
    {
        return $this->stringToArray($this->cta_points);
    }

    public function getCtaTrustChipsArrayAttribute(): array
    {
        return $this->stringToArray($this->cta_trust_chips);
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