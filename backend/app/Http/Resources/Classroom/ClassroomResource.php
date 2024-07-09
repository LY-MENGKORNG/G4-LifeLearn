<?php

namespace App\Http\Resources\Classroom;

use App\Http\Resources\Grade\GradeResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


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
            'name' => $this->name,
            'description' => $this->description,
            'grade' => new GradeResource($this->grade),
        ];
    }
}
