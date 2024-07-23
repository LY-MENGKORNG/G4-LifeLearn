<?php

namespace App\Http\Resources\Classroom;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Users\FrontUserResource;
use App\Http\Resources\Users\UserResource;

class ClassroomResource extends JsonResource
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
            'grade_id' => $this->grade_id,
            'class_name' => $this->class_name,
            'description' => $this->description,
            'user' => new FrontUserResource($this->user),
        ];
    }
    
}
