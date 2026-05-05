<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ResourceCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'status'     => 'boolean',
    ];

    protected static function booted()
    {
        static::saving(function ($category) {
            if (!$category->slug && $category->name) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    public function activeResources()
    {
        return $this->hasMany(Resource::class)
            ->where('status', 1)
            ->orderBy('sort_order')
            ->latest();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}