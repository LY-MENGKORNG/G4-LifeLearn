<?php

namespace App\Http\Resources\Payment;

use App\Http\Resources\Users\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DocumentResource extends JsonResource
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
            'school_name' => $this->school_name,
            'school_address' => $this->school_address,
            'school_phone_number'=>$this->school_phone_number,

        ];
    }
}
