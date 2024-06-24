<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 
        'subject_id',
        'semester_id',
    ];
    public static function list() {
        $score = self::all();
        return $score;
    }

    public static function store($request, $id = null)
    {

        $scoreData = $request->only('student_id', 'subject_id', 'semester_id');
        $score = self::updateOrCreate(['id' => $id], $scoreData);
        return $score;
    }

    public function student(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    } 

    // public function subject(): BelongsTo 
    // {
    //     return $this->belongsTo(Subject::class);
    // } 

    // public function semester(): BelongsTo 
    // {
    //     return $this->belongsTo(Semester::class);
    // } 



}
