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
        'title',
        'description',
        'category_id',
        'price',
        'user_id',
        'duration',
        'cover'
    ];
    public static function list()
    {
        $courses = self::all();
        return $courses;
    }
    public static function store($request, $id = null)
    {
        $courseData = $request->only('title', 'description', 'category_id', 'price', 'user_id', 'duration', 'cover');
        $courses = self::updateOrCreate(['id' => $id], $courseData);
        return $courses;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
