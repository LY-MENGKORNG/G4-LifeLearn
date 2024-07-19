<?php

namespace App\Models;

use App\Traits\UploadFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Submite extends RelationshipModel
{
    use HasFactory, UploadFile;
    protected $fillable = ['user_id', 'classroom_id', 'assignment_id', 'work'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }

    public static function list()
    {
        return self::all();
    }

    public static function store($request, $id = null)
    {
        $data = [
            'user_id' => $request->user()->id,
            'classroom_id' => $request->classroom_id,
            'assignment_id' => $request->assignment_id,
            'work' => $request->work
        ];
        
        $file_name = null;
        if($request->hasfile('work')){
            $file_name = UploadFile::saveFile($request->work);
        }
        $data['work'] = $file_name;

        $data = self::updateOrCreate(['id' => $id], $data);
        return $data;
    }
}
