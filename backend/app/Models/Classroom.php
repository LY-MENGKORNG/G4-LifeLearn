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

    protected $fillable = ['grade_id','class_name', 'description','user'];

    // public function grade(): BelongsTo 
    // {
    //     return $this->belongsTo(Grade::class);
    // }
    public function subject(): BelongsTo 
    {
        return $this->belongTo(Subject::class);
    }
    public function comment(): BelongsTo
    {
        return $this->belongsTo(Comment::class);
    }
    public function frontusers()
    {
        return $this->belongsToMany(Frontuser::class);
    }

    public function user()
    {
        return $this->belongsTo(Frontuser::class);
    }
    public function quiz()
    {
        return $this->belongsToMany(Quiz::class);
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }

    public static function list() {
        return self::all(); 
    }
    public static function store($request, $id = null)
    {
        $data = [
            'grade_id' => $request->grade_id,
            'class_name' => $request->class_name,
            'description' => $request->description,
        ];
    
        $classroom = self::updateOrCreate(['id' => $id], $data);
    
        // Assign the user relationship
        $classroom->user()->associate($request->user()->id);
        $classroom->save();
        dd($classroom);
    
        // return $classroom;
    }
    
}

    

