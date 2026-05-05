<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Resource extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'resource_category_id',

        'title',
        'slug',
        'short_description',
        'content',

        'type_label',
        'type_icon',
        'main_icon',
        'media_color_class',

        'read_time',
        'industry_or_meta',
        'tags',

        'button_text',
        'button_url',

        'is_featured',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'sort_order'  => 'integer',
        'status'      => 'boolean',
    ];

    protected static function booted()
    {
        static::saving(function ($resource) {
            if (!$resource->slug && $resource->title) {
                $resource->slug = Str::slug($resource->title);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(ResourceCategory::class, 'resource_category_id');
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('resource_image')
            ->singleFile();

        $this
            ->addMediaCollection('resource_file')
            ->singleFile();
    }

    public function getImageUrlAttribute()
    {
        return $this->getFirstMediaUrl('resource_image')
            ?: asset('assets/img/resources/default.png');
    }

    public function getFileUrlAttribute()
    {
        return $this->getFirstMediaUrl('resource_file');
    }

    public function getTagsArrayAttribute(): array
    {
        return $this->stringToArray($this->tags);
    }

    public function getButtonLinkAttribute()
    {
        if ($this->file_url) {
            return $this->file_url;
        }

        if ($this->button_url) {
            return $this->button_url;
        }

        return route('resources.show', $this->slug);
    }

    public function getCardColorClassAttribute()
    {
        return $this->media_color_class ?: 'mres-card-media';
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

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', 1);
    }
}