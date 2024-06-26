<?php

namespace App\Http\Resources\Courses;

use App\Http\Resources\Category\CategoryResource;
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
            'category' => new CategoryResource($this->category),
            'price' => $this->price,
            'user' => new UserResource($this->user),
            'duration'=>$this->duration,
        ];
    }
}
