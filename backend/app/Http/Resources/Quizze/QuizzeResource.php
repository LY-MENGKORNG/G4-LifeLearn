<?php

namespace App\Http\Resources\Quizze;

use App\Http\Resources\Subjects\SubjectResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizzeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'subject_id' => new SubjectResource($this->subject),
        ];
    }
}
