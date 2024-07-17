<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
        'method', 
        'amount', 
        'course_id',
        'system_id'
    ];

    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    public function course(): BelongsTo 
    {
        return $this->belongsTo(Course::class);
    }
    
    public function system(): BelongsTo 
    {
        return $this->belongsTo(System::class);
    }

    public static function list() {
        return self::all(); 
    }
    public static function store($request, $id = null)
    {
        $data = [
            'user_id' => $request->user()->id,
            'method' => $request->method,
            'amount' => $request->amount,
            'course_id' => $request->course_id ?? null,
            'system_id' => $request->system_id ?? null
        ];
        $document = self::updateOrCreate(['id' => $id], $data);
        return $document;
    }
}
