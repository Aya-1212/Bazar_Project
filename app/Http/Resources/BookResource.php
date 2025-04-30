<?php

namespace App\Http\Resources;

use App\Http\Traits\FileSystem;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class BookResource extends JsonResource
{ 
    use FileSystem ;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       
        return [
            'id' => $this->id,
            'isbn_code' => $this->isbn_code,
            'title' => $this->title,
            'image' => $this->getImageUrl('books/'. $this->image),
            'author' => $this->author,
            'description' => $this->description,
            'price'=>$this->price,
            'price_after_discount'=> $this->price_after_discount,
            'discount'=> $this->discount,
            'stock_quantity'=> $this->stock_quantity,
            'category_id'=>$this->category_id,
            'publisher_id' => $this->publisher_id,
        ];

    }
}
