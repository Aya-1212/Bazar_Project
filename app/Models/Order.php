<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable  =[
        'total_amount',
        'payment_method',
        'status',
        'user_id',
        'review_id',
        ];
    use HasFactory;
    public function user (){

   return $this->belongsTo(User::class);
    }
    public function review (){
        return $this->belongsTo(Review::class);
    }
    public function books (){
        return $this->belongsToMany(Book::class, "book_order", 'order_id', 'book_id')->
        withPivot([
            "quantity",
            "sub_total"])->withTimeStamps();
    }
    
}
