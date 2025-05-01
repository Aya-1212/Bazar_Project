<?php

namespace App\Http\Resources;

use App\Http\Traits\FileSystem;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    use FileSystem;
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
            'image' =>$this->getImageUrl('categories/'.$this->image),
        ];
    }
}
