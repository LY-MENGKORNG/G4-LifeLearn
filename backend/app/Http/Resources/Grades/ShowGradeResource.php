<?php

namespace App\Http\Resources\Grades;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowGradeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'grade_number' => $this->grade_number,
            'system_id' => $this->system_id,
            'classes' => $this->classes
        ];
    }
}