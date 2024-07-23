<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLearn extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_course_id',
        'user_book_id',
    ];
}
