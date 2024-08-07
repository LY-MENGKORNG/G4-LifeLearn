<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends RelationshipModel
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'reference_id'
    ]; 
    public static function list() {
        return self::all(); 
    }
    public static function store($request, $id = null)
    {   
        
        $data = [
            'name' => $request->name,
            'reference_id' => $request->reference_id,
        ];
        $document = self::updateOrCreate(['id' => $id], $data);
        return $document;
    }
}
