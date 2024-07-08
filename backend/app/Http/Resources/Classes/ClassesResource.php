<?php

namespace App\Http\Resources\Classes;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClassesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'grade_id'=>$this->grade_id,
            'name'=>$this->name,
        ];
    }
}
