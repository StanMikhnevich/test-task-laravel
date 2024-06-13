<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'desc' => $this->desc,
            'image' => asset($this->image_path),
            'published_at' => $this->published_at,
            'authors' => BookAuthorResource::collection($this->authors),
        ];
    }
}
