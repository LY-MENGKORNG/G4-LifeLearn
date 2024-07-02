<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        $system = [
            'name' => $request->name,
            'user_id' => $request->user_id,
            'location' => $request->location
        ];
        $system = self::updateOrCreate(['id' => $id], $system);
        return $system;
    }
}
