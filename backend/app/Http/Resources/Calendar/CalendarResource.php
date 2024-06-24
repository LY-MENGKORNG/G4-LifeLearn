<?php

namespace App\Http\Resources\Calendar;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CalendarResource extends JsonResource
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
            'time' => $this->time,
            'day' => $this->day,
            'week' => $this->week,
            'month' => $this->month,
            'year' => $this->year,
            'grade_id' => new GradeResource($this->grade),
        ];
    }
}
