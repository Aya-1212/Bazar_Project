<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'image',
        'price',
        'author',
        'description',
       'stock_quantity',
       'discount',
       'price_after_discount',
    ];
    use HasFactory;
    public function publisher (){
        return $this->belongsTo(Publisher::class);
    }
    public function category (){
        return $this->belongsTo(Category::class);
    }
    public function orders (){
        return $this->belongsToMany(Order::class, "book_order", 'book_id', 'order_id')->
        withPivot([
            "quantity",
            "sub_total"])->withTimeStamps();
        
    }

    public function carts(){
        return $this->belongsToMany(Cart::class);
    }

    public function wishlists(){
        return $this->belongsToMany(Wishlist::class);
    }
}
