<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualityPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_eyebrow',
        'hero_title',
        'hero_highlight',
        'hero_description',
        'hero_chips',

        'hero_kpi_1_value',
        'hero_kpi_1_label',
        'hero_kpi_2_value',
        'hero_kpi_2_label',
        'hero_kpi_3_value',
        'hero_kpi_3_label',

        'snapshot_label',
        'snapshot_badge',

        'floating_badge_icon',
        'floating_badge_title',
        'floating_badge_text',

        'pillar_eyebrow',
        'pillar_title',
        'pillar_description',

        'process_eyebrow',
        'process_title',
        'process_description',
        'process_note',

        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

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