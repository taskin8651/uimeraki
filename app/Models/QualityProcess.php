<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualityProcess extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'title',
        'description',
        'points',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'status'     => 'boolean',
    ];

    public function getPointsArrayAttribute(): array
    {
        return $this->stringToArray($this->points);
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