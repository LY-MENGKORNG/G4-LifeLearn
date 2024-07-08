<?php

namespace App\Http\Resources\Systems;

use App\Http\Resources\Users\FrontUserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListSystemResource extends JsonResource
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
            'name' => $this->name,  
            'principle' => new FrontUserResource($this->frontusersssss),
            'location' => $this->location, 
        ];
    }
}
