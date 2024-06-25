<?php

namespace App\Http\Resources\Submite;

use App\Http\Controllers\Api\Assigment\AssigmentController;
use App\Http\Resources\Assignment\AssignmentResource;
use App\Http\Resources\Users\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubmiteResource extends JsonResource
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
            'user_id' => new UserResource($this->user),
            'assignment_id' => new AssigmentController($this->assignment),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
