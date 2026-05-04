<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class IndustryPage extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'hero_eyebrow',
        'hero_title',
        'hero_highlight',
        'hero_description',
        'hero_chips',

        'section_eyebrow',
        'section_title',
        'section_description',

        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('industry_hero_image')
            ->singleFile();
    }

    public function getHeroImageUrlAttribute()
    {
        return $this->getFirstMediaUrl('industry_hero_image')
            ?: asset('assets/img/industries/hero.png');
    }

    public function getHeroChipsArrayAttribute(): array
    {
        return $this->stringToArray($this->hero_chips);
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