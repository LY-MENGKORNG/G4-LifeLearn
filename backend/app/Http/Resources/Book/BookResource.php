<?php

namespace App\Http\Resources\Book;

use App\Http\Resources\Users\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'title' => $this->title,
            'author' => $this->author,
            'user' => new UserResource($this->user),
            'published_date' => $this->published_date,
            'price'=>$this->price,
            'description'=>$this->description,
            'cover' =>  'http://localhost:8000/images/' . $this->cover,
            'file' =>  'http://localhost:8000/documents/' . $this->file
        ]; 
    }
}
