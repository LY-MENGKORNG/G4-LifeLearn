<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id', 
        'classroom_id'
    ];
    public static function list() {
        $subject = self::all();
        return $subject;
    }
    public static function store($request, $id = null)
    {
        $subjectData = $request->only('course_id','classroom_id');
        $subject = self::updateOrCreate(['id' => $id], $subjectData);
        return $subject;
    }
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }


}
