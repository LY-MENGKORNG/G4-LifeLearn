<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Score extends RelationshipModel
{
    use HasFactory;

    protected $fillable = [
        'score',
        'feedback',
        'student_id', 
        'subject_id',
        'semester_id',
    ];
    public static function list() {
        $score = self::all();
        return $score;
    }

    public function student(): BelongsTo 
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public static function store($request, $id = null)
    {

        $scoreData = $request->only('score','feedback','student_id', 'subject_id', 'semester_id');
        $score = self::updateOrCreate(['id' => $id], $scoreData);
        return $score;
    }

    // public function student(): BelongsTo 
    // {
    //     return $this->belongsTo(User::class);
    // } 

    // public function subject(): BelongsTo 
    // {
    //     return $this->belongsTo(Subject::class);
    // } 

    // public function semester(): BelongsTo 
    // {
    //     return $this->belongsTo(Semester::class);
    // } 



}
