<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 
        'author', 
        'user_id', 
        'published_at', 
        'price'
    ];

    public function user(): BelongsTo  // get author
    {
        return $this->belongsTo(User::class);
    }
}
