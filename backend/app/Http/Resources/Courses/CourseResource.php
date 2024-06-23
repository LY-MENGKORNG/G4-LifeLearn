<?php

namespace App\Http\Resources\Courses;

use Illuminate\Http\Request;
use App\Http\Resources\Users\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'user_id' => new UserResource($this->user),
            'duration'=>$this->duration,

        ];
    }
}
