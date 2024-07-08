<?php

namespace App\Models;

use App\Http\Resources\Systems\ListSystemResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class System extends RelationshipModel
{
    use HasFactory;
    protected $fillable = [
        'name',
        'frontuser_id',
        'location'
    ];

    public static function  list()
    {
        return self::all();
    }


    public function front_user(): BelongsTo
    {
        return $this->belongsTo(Frontuser::class, 'frontuser_id');
    }

    public static function createOrUpdate($request, $id = null)
    {
        $system = [
            'name' => $request->name,
            'frontuser_id' => $request->frontuser_id,
            'location' => $request->location
        ];
        $system = self::updateOrCreate(['id' => $id], $system);
        return $system ? true : false;
    }
}
