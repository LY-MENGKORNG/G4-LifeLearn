<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Calendar extends Model
{
    use HasFactory;

    protected $fillable = [
        'time', 
        'day', 
        'week', 
        'month', 
        'year',
        'grade_id'
    ];

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }

}