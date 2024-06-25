<?php

namespace App\Http\Resources\Payment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'user_id' =>$this->user_id,
            'method' => $this->method,
            'amount' => $this->amount,
            'course_id' => $this->course_id,
            'system_id' => $this->system_id,

        ];
    }
}
