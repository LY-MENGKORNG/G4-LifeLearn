<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'classroom_id',
        'title',
        'instructions',
        'points',
        'deadline',
        'topics',
        'links',
        'fields'
    ];

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }

    public static function store($request, $id = null)
    {
        $data = $request->only('classroom_id', 'title', 'instructions', 'points', 'deadline', 'topics', 'links', 'fields');
        
        // Ensure the 'deadline' is in the format 'd-m-Y' before parsing
        if (isset($data['deadline'])) {
            try {
                $data['deadline'] = Carbon::createFromFormat('d-m-Y', $data['deadline'])->toDateString();
            } catch (\Exception $e) {
                // Handle the exception if the date format is incorrect
                return response()->json(['error' => 'Invalid date format for deadline.'], 400);
            }
        }
        
        $quiz = self::updateOrCreate(['id' => $id], $data);
        dd($quiz);

        // return $quiz;
    }
}
