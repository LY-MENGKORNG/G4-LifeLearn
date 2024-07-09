<?php

namespace App\Http\Resources\Grade;

use App\Http\Resources\Systems\ListSystemResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class GradeResource extends JsonResource
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
            'grade_number'=>$this->grade_number,
            'system'=> new ListSystemResource($this->systems)
            
        ];
    }
}
