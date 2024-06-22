<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends RelationshipModel
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'location'
    ];

    public static function list() {
        return self::all();
    }

    public static function createOrUpdate($request, $id = null)
    {
        
    }
}
