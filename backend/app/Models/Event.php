<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'type',
        'start_date',
        'end_date',
        'location',
        'organizer_id',
    ];

    public function orgranizer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'organizer_id', 'id');
    }
}
