<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id', 
        'classroom_id'
    ];

    // public function course(): BelongsTo
    // {
    //     return $this->belongsTo(Course::class);
    // }

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }


}
