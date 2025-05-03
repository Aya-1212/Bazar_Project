<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Http\Resources\WishlistResource;
use App\Http\Traits\FileSystem;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class WishlistController extends ApiController
{
    use FileSystem;
    public function AddToWishlist (Request $request){
        $validator = Validator::make($request->all(), [
         'book_id' => 'required|exists:books,id',
        
        ],
        [
            'book_id.required' => 'The book id is Required',
            'book_id.exists' => 'The Selected Book is not Exists',
        ]
    );
     if ($validator->fails()){
        return $this->apiResponse(error:$validator->errors(), 
        message:'Unprocessed Request', status:422);
     }
     $user = Auth::user();
     $wishlist = Wishlist::firstOrCreate([
       'user_id' => $user->id,
     ]
     );
     if (!$wishlist->books()->where('book_id', $request->book_id)->exists()) {
        $wishlist->books()->attach($request->book_id);
    }
    return $this->apiResponse([
         'books' =>  BookResource::collection($wishlist->books()->get()),
       
         
    ],
       message: "Book Added Successfully",

);
    }
    public function showWishlist(){

        $user = Auth::user();
        $wishlist = Wishlist::firstOrCreate([
            "user_id"=> $user->id,
        ]);
        return $this->apiResponse([
            'books' => BookResource::collection($wishlist->books()->get()),
        ],
        message: 'Books Returned Successfully',
    );
    }
    public function removeFromWishlist (Request $request){
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
           
           ],
           [
               'book_id.required' => 'The book id is Required',
               'book_id.exists' => 'The Selected Book is not Exists',
           ]
       );
        if ($validator->fails()){
           return $this->apiResponse(error:$validator->errors(), 
           message:'Unprocessed Request', status:422);
        }
        $user = auth()->user(); 
    $wishlist = Wishlist::where('user_id', $user->id)->first();

     if (!$wishlist){
       return $this->apiResponse([],
       message:'Wishlist not found', status:404);
    }
    $book_id = $request->book_id;
     if (!$wishlist->books()->where('book_id', $book_id)->exists()) {
        return $this->apiResponse([],
    error: 'Book not Found', status:404);
   
    }
    $wishlist->books()->detach($book_id);
    return $this->apiResponse([
        'books' => BookResource::collection($wishlist->books()->get()),
    ],
    message: 'Books Deleted Successfully', );

}
}
