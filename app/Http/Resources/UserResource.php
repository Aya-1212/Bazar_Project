<?php

namespace App\Http\Resources;

use App\Http\Traits\FileSystem;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'city' => $this->city,
            'phone' => $this->phone,
            'password' => $this->password,
            'image' => $this->getImageUrl('users/'.$this->image),
            
        ];

    }
}
