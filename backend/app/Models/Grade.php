<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use PHPUnit\Event\Telemetry\System;

class Grade extends RelationshipModel
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "grade_number",
        "system_id",
        "status"
        
    ];

    public function system(): BelongsTo
    {
        return $this->belongsTo(System::class);
    }
<<<<<<< HEAD
    
=======

    public function classes(): HasMany
    {
        return $this->hasMany(Classes::class, 'grade_id', 'id');
    }

    public static function list() {
        return self::all(); 
    }
    public static function store($request, $id = null)
    {
        $data = $request->only('grade_number','system_id');
        $grade = self::updateOrCreate(['id' => $id], $data);
        return $grade;
    }
>>>>>>> 05418e97f31410212ebc641a3f7fafa6f0f9b149
}
