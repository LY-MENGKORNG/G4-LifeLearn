<?php

namespace App\Http\Resources\Users;

use App\Http\Resources\Systems\SystemResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FrontUserResource extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'profile' =>   config('app.url'). ':8000/images/'  .$this->profile,
            'system' => new SystemResource($this->system),
            'role' => RoleResource::collection($this->roles),
            'last_seen' => $this->last_seen,
        ];
    }
}