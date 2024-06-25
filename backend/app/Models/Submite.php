<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Submite extends RelationshipModel
{
    use HasFactory;
    protected $fillable = ['user_id', 'assignment_id'];

    public static function list()
    {
        $list = self::query();
    }

    public static function store($request, $id = null)
    {
        $data = ['user_id' => $request->user()->id, 'assignment_id'];
        $data = self::updateOrCreate(['id' => $id], $data);
        return $data;
    }
}
