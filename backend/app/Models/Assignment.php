<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'subject_id',
        'calendar_id',
    ];

    public static function list() {
        $assigment = self::all();
        return $assigment;
    }

    public static function store($request, $id = null)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'subject_id' => 'required|integer',
            'calendar_id' => 'required|integer', 
        ]);

        $assigmentData = $request->only('title', 'description', 'subject_id', 'calendar_id');
        $assigment = self::updateOrCreate(['id' => $id], $assigmentData);
        return $assigment;
    }
    

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
}
