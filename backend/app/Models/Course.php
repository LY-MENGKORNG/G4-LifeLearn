<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends RelationshipModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'price',
        'user_id',
        'duration'
    ];
}
