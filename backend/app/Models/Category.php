<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends RelationshipModel
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'description'];


    public static function list() {
        $category = self::all();
        return $category;
    }

    public static function store($request, $id = null)
    {

        $categoryData = $request->only('name', 'description');
        $category = self::updateOrCreate(['id' => $id], $categoryData);
        return $category;
    }
    
}
