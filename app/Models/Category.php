<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable  =[
        'title',
        'image',
        ];
    use HasFactory;
    public function books (){
        return $this->belongsToMany(Book::class);
    }
}
