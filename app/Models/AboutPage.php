<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AboutPage extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'hero_eyebrow',
        'hero_title',
        'hero_highlight',
        'hero_description',
        'hero_chips',
        'hero_stat_1_value',
        'hero_stat_1_label',
        'hero_stat_2_value',
        'hero_stat_2_label',
        'hero_stat_3_value',
        'hero_stat_3_label',
        'hero_footnote',
        'hero_tag_1',
        'hero_tag_2',

        'journey_eyebrow',
        'journey_title',
        'journey_description_1',
        'journey_description_2',

        'mission_eyebrow',
        'mission_title',
        'mission_description',
        'mission_points',

        'vision_eyebrow',
        'vision_title',
        'vision_description',
        'vision_points',

        'why_eyebrow',
        'why_title',
        'why_description',
        'why_micro_points',

        'cta_title',
        'cta_description',
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
            ->addMediaCollection('about_hero_image')
            ->singleFile();
    }

    public function getHeroImageUrlAttribute()
    {
        return $this->getFirstMediaUrl('about_hero_image')
            ?: asset('assets/img/about/hero.png');
    }

    public function getHeroChipsArrayAttribute()
    {
        return $this->stringToArray($this->hero_chips);
    }

    public function getMissionPointsArrayAttribute()
    {
        return $this->stringToArray($this->mission_points);
    }

    public function getVisionPointsArrayAttribute()
    {
        return $this->stringToArray($this->vision_points);
    }

    public function getWhyMicroPointsArrayAttribute()
    {
        return $this->stringToArray($this->why_micro_points);
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