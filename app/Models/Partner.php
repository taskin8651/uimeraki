<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Partner extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'status'     => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('partner_image')
            ->singleFile();
    }

    public function getImageUrlAttribute()
    {
        return $this->getFirstMediaUrl('partner_image')
            ?: asset('assets/img/no-image.png');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}