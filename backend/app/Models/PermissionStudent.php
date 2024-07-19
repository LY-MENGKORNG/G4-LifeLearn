<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermissionStudent extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id',
        'purpose',
        'start_date',
        'end_date',
    ];

    public static function list() {
        return self::all(); 
    }


    public function frontuser()
    {
        return $this->belongsTo(Frontuser::class, 'student_id');
    }

}
