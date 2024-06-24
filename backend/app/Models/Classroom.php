<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classroom extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['grade_id'];

    // public function grade(): BelongsTo 
    // {
    //     return $this->belongsTo(Grade::class);
    // }
    public function subject(): HasMany 
    {
        return $this->hasManyTo(Subject::class);
    }
    public function comment(): HasMany
    {
        return $this->hasManyTo(Comment::class);
    }


    
}
