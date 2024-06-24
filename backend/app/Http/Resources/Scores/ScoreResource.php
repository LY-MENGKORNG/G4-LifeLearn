<?php

namespace App\Http\Resources\Scores;

use App\Http\Resources\Semesters\SemesterResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Users\UserResource;
use App\Http\Resources\Subjects\SubjectResource;


class ScoreResource extends JsonResource
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
            'student' => new UserResource($this->student),
            'subject' => new SubjectResource($this->subject),
            'semester'=> new SemesterResource($this->semester),
        ];
    }
}
