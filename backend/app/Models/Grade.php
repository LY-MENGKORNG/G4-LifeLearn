<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use PHPUnit\Event\Telemetry\System;

class Grade extends Model
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

    public static function list() {
        return self::all(); 
    }
    public static function store($request, $id = null)
    {
        $data = $request->only('grade_number','system_id','status');
        $document = self::updateOrCreate(['id' => $id], $data);
        return $document;
    }
}
