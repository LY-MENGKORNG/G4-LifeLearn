<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classroom extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['grade_id'];

    // public function grade(): BelongsTo 
    // {
    //     return $this->belongsTo(Grade::class);
    // }
    public function subject(): BelongsTo 
    {
        return $this->belongsTo(Subject::class);
    }

    
}
