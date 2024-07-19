<?php

namespace App\Http\Resources\Payment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReferenceResource extends JsonResource
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
            'name' =>$this->name,
            'user' =>$this->user,
            'school_name' =>$this->school_name,
            'school_address' =>$this->school_address,
            'documents' =>$this->documents,
        ];
    }
}
