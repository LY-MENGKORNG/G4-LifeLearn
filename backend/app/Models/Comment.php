<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
class Comment extends RelationshipModel
{
    use HasFactory;

    protected $fillable = [
        'text',
        'user_id',
        'classroom_id',
        'assignment_id',
    ];
    public static function list() {
        $comment = self::all();
        return $comment;
    }

    public static function store($request, $id = null)
    {

        $commentData = $request->only('text', 'user_id', 'classroom_id', 'assignment_id');
        $comment = self::updateOrCreate(['id' => $id], $commentData);
        return $comment;
    }
    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }
    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }

}
