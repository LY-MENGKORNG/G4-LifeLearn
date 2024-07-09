<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reference extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'user_id',	
        'school_name',	
        'school_address',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }

    public static function list()
    {
        return self::all();
    }

    public static function store($request, $id = null)
    {
        $data = [
            'principle_id' => $request->principle_id,
            'document_id' => $request->document_id,
            'status' => $request->status,
        ];
        $document = self::updateOrCreate(['id' => $id], $data);
        return $document;
    }
}
