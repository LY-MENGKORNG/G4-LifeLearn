<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends RelationshipModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 
        'author', 
        'user_id', 
        'published_at', 
        'price',
    ];

    public static function createOrUpdate($request, $id = null)
    {
        $book = $request->only('title', 'author', 'user_id', 'published_at', 'price');
    }
}
