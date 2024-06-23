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
    public static function list() {
        $courses = self::all();
        return $courses;
    }
    public static function store($request, $id = null)
    {

        $courseData = $request->only('price', 'duration', 'user_id', 'category_id');
        $courses = self::updateOrCreate(['id' => $id], $courseData);
        return $category;
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
