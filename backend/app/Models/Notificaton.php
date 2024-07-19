<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notificaton extends RelationshipModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id',  'description','receiver_id' ];

    public static function list()
    {
        return self::all();
    }

    public function front_user(): BelongsTo
    {
        return self::belongsTo(Frontuser::class, 'sender', 'id');
    }

    public  function receiver(): BelongsTo
    {
        return self::belongsTo(User::class, 'receiver', 'id');
    }
 
}
