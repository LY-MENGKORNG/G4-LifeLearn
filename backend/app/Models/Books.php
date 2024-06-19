<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Books extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'author_id', 'published_at', 'price'];

    public function author(): BelongsTo  // get author
    {
        return $this->belongsTo(User::class);
    }
}
