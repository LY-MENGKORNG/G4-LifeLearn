<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notificaton extends RelationshipModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['classroom_id', 'user_id', 'receiver', 'description'];
 
    public static function list()
    {
        return self::all();
    }

    public static function front_user(): BelongsTo
    {
        return self::belongsTo(Frontuser::class, 'sender', 'id');
    }

    public static function receiver(): BelongsTo
    {
        return self::belongsTo(User::class, 'receiver', 'id');
    }

    public static function store($request, $id = null)
    {
        $notificationData = $request->only('classroom_id','user_id', 'receiver', 'description');
        $notification = self::updateOrCreate(['id' => $id], $notificationData);
        return $notification;
    }
}
