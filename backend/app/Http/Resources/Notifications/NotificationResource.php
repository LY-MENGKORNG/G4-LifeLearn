<?php

namespace App\Http\Resources\Notifications;

use App\Http\Resources\Users\UserResource;
use App\Http\Resources\Classroom\ClassroomResource;
use App\Http\Resources\Users\FrontUserResource;
// use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'sender' => new FrontUserResource($this->front_user),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
        
    }
}
