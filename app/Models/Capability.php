<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Capability extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'badge_icon',
        'badge_text',
        'tags',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'status' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('capability_image')
            ->singleFile();
    }

    public function getImageUrlAttribute()
    {
        return $this->getFirstMediaUrl('capability_image')
            ?: asset('assets/img/capabilities/default.png');
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