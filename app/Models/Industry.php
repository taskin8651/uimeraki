<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Industry extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'badge_icon',
        'badge_text',
        'tags',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'status'     => 'boolean',
    ];

    protected static function booted()
    {
        static::saving(function ($industry) {
            if (!$industry->slug && $industry->title) {
                $industry->slug = Str::slug($industry->title);
            }
        });
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('industry_image')
            ->singleFile();
    }

    public function getImageUrlAttribute()
    {
        return $this->getFirstMediaUrl('industry_image')
            ?: asset('assets/img/industries/default.png');
    }

    public function getTagsArrayAttribute(): array
    {
        if (!$this->tags) {
            return [];
        }

        return array_filter(array_map('trim', explode(',', $this->tags)));
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}