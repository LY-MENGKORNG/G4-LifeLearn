<?php

namespace App\Models;

use App\Traits\UploadFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Quiz extends Model
{
    use HasFactory, UploadFile;

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

    public static function list() 
    {
        return self::all();
    }

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }

    public static function store($request, $id = null)
    {
        $data = $request->only('classroom_id', 'title', 'instructions', 'points', 'deadline', 'topics', 'links', 'fields');
        $file_name = null;
        if($request->hasfile('fields')){
            $file_name = UploadFile::saveFile($request->fields);
        }
        $data['fields'] = $file_name;
        // Ensure the 'deadline' is in the format 'd-m-Y' before parsing
        if (isset($data['deadline'])) {
            try {
                $data['deadline'] = Carbon::createFromFormat('Y-m-d', $data['deadline'])->toDateString();
            } catch (\Exception $e) {
                // Handle the exception if the date format is incorrect
                return response()->json(['error' => 'Invalid date format for deadline.'], 400);
            }
        }
        
        $quiz = self::updateOrCreate(['id' => $id], $data);

        return $quiz;
    }
}
