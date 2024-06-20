<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends RelationshipModel
{
    use HasFactory;

    protected $fillable = [
        'text',
        'user_id',
        'comment_id',
        'classroom_id',
        'assignment_id',
    ];
}
