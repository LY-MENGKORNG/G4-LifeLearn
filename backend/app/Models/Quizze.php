<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quizze extends Model
{
    use HasFactory;
    protected $fillable = ['subject_id'];


    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public static function list()
    {
        $list = self::query();
    }

    public static function store($request, $id = null)
    {
        $data = $request->only('subject_id');
        $data = self::updateOrCreate(['id' => $id], $data);
        return $data;
    }
}
