<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'name',
        'company',
        'email',
        'phone',
        'industry',
        'enquiry_type',
        'message',
        'target_lead_time',
        'expected_annual_volume',
        'nda_required',
        'status',
    ];

    protected $casts = [
        'nda_required' => 'boolean',
    ];

    public const STATUS_SELECT = [
        'new'     => 'New',
        'read'    => 'Read',
        'replied' => 'Replied',
        'closed'  => 'Closed',
    ];
}