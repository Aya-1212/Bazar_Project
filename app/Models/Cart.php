<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable  =[
    'totla_price',
    ];
    use HasFactory;

    public function books(){
        return $this->belongsToMany(Book::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
