<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends RelationshipModel
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'grade_id',
        'name',
        'system_id'
    ];
}
