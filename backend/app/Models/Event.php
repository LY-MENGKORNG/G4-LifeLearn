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

    public static function store($request, $id = null)
    {
        $eventData = [
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'location' => $request->location,
            'organizer_id' => $request->user()->id, // Assuming the authenticated user is the organizer
        ];

        return self::updateOrCreate(['id' => $id], $eventData);
    }

    public function organizer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'organizer_id', 'id');
    }
}
