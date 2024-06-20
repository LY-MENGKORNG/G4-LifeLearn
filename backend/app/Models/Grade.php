<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PHPUnit\Event\Telemetry\System;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade_number',
        'system_id',
        'status'
    ];

    public function system(): BelongsTo
    {
        return $this->belongsTo(System::class);
    }
}
