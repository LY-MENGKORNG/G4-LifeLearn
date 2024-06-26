<?php

namespace App\Http\Resources\Comments;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Users\UserResource;
use App\Http\Resources\Classroom\ClassroomResource;
use App\Http\Resources\Assignment\AssignmentResource;


class CommentResource extends JsonResource
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
            'text' => $this->text,
            'user' => new UserResource($this->user),
            'classroom'=> new ClassroomResource($this->classroom),
            'assignment' => new AssignmentResource($this->assignment)
        ];
    }
}
