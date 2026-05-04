<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'product_category_id',
        'name',
        'slug',
        'short_description',
        'description',
        'thickness',
        'material_type',
        'application',
        'key_feature',
        'options',
        'badges',
        'specs',
        'is_featured',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });

        static::updating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('product_image')
            ->singleFile();

        $this
            ->addMediaCollection('product_gallery');
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function getMainImageUrlAttribute()
    {
        return $this->getFirstMediaUrl('product_image')
            ?: asset('assets/img/no-image.png');
    }

    public function getGalleryImagesAttribute()
    {
        return $this->getMedia('product_gallery');
    }

    public function getBadgesArrayAttribute()
    {
        if (!$this->badges) {
            return [];
        }

        return array_filter(array_map('trim', explode(',', $this->badges)));
    }

    public function getSpecsArrayAttribute()
    {
        if (!$this->specs) {
            return [];
        }

        return array_filter(array_map('trim', explode(',', $this->specs)));
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