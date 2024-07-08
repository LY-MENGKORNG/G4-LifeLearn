<?php

namespace App\Models;
use App\Models\RelationshipModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Favorite extends RelationshipModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'book_id',
        'status'
    ];
    public static function list() {
        $favorite = self::all();
        return $favorite;
    }
    public static function store($request, $id = null)
    {
        $favorite = [
            'user_id' => $request->user()->id,
            'book_id' => $request->book_id,
            'status' => $request->status ? false : true
        ];

        $favorite = self::updateOrCreate(['id' => $id], $favorite);
        return $favorite;
    }

}