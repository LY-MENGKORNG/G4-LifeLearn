<?php

namespace App\Http\Resources\Assignment;

use App\Http\Resources\Subjects\SubjectResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AssignmentResource extends JsonResource
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
            'description' => $this->description,
            'subject' => new SubjectResource($this->subject), // Use the relationship method `subject`
            'calendar_id' => $this->calendar_id,
        ];
    }
}
