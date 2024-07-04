<?php

namespace App\Http\Resources\Users;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'phone' => $this->phone,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'profile' => 'http://localhost:8000/images/'.$this->profile,
            'role' => $this->roles
        ];
    }
}