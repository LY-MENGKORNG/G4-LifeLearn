<?php

namespace App\Http\Resources\Subjects;

use Illuminate\Http\Request;
use App\Http\Resources\Courses\CourseResource;
use App\Http\Resources\Classrooms\ClassroomResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SubjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'course_id' => new CourseResource($this->course),
            'classroom_id' => new ClassroomResource($this->classroom),
           
        ];
    }
}
