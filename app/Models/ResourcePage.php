<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourcePage extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_eyebrow',
        'hero_title',
        'hero_description',
        'search_placeholder',
        'quick_tags',

        'meta_1_value',
        'meta_1_label',
        'meta_2_value',
        'meta_2_label',
        'meta_3_value',
        'meta_3_label',

        'featured_label',
        'featured_resource_id',

        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function featuredResource()
    {
        return $this->belongsTo(Resource::class, 'featured_resource_id');
    }

    public function getQuickTagsArrayAttribute(): array
    {
        return $this->stringToArray($this->quick_tags);
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