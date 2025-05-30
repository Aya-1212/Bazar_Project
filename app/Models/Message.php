<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable  =[
        'name',
        'email',
        'subject',
        'content',
        ];
    use HasFactory;
    public function user (){
        return $this->belongsTo(User::class);
    }
}
