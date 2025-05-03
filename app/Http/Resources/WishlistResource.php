<?php

namespace App\Http\Resources;

use App\Http\Traits\FileSystem;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WishlistResource extends JsonResource
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
            'id' => $this->book->id,
            'name'=> $this->book->title,
            'price' => number_format($this->book->price, 2),
            'category_name' => $this->category->name,
            'image' => $this->getImageUrl('/books'. '/'. $this->book->image),
            'stock_quantity' => $this->book->stock_quantity,
            'discount' => $this->book->discount,
            'price_after_discount' => $this->book->price_after_discount,
            'description' => $this->book->description,
        ];
    }
}
