<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'user_id',
        'school_name',
        'School_address',
        'school_phone_number'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function list() {
        return self::all(); 
    }
    public static function store($request, $id = null)
    {
        $data = $request->only('user_id',
        'school_name','School_address','school_phone_number');
        $document = self::updateOrCreate(['id' => $id], $data);
        return $document;
    }
}
