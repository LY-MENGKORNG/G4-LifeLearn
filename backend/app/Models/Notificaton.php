<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notificaton extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['classroom_id', 'user_id'];

    // public function classroom(): BelongsTo 
    // {
    //     return $this->belongsTo(Classroom::class);
    // }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function list()
    {
        return self::all();
    }
}
