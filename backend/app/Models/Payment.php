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
            'user_id' => $request->input('user_id'),
            'method' => $request->input('method'),
            'amount' => $request->input('amount'),
            'course_id' => $request->input('course_id'),
            'system_id' => $request->input('system_id')
        ];
        $document = self::updateOrCreate(['id' => $id], $data);
        return $document;
    }
}
