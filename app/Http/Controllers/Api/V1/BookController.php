<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends ApiController
{
   public function index(){
     $books = Book::paginate('10');
     return $this->apiResponse([
        'books' => BookResource::collection( $books ),
        "meta" => [
                    "total" => $books->total(),
                    "per_page" => $books->perPage(),
                    "cuurent_page" => $books->currentPage(),
                    "last_page" => $books->lastPage(),
                ],
                "links" => [
                    "first" => $books->url(1),
                    "last" => $books->url($books->lastPage()),
                    "prev" => $books->previousPageUrl(),
                    "next" => $books->nextPageUrl(),
                ],
        
     ]
   , message:"Book Returned Successfully"
    );
     
   }
   public function show($id){
       try{
        $book = Book::findOrFail($id);
        return $this->apiResponse([
            'book' => new BookResource($book ),

        ], message:"Book Returned Successfully"

    );
       }
       catch (\Exception $e){
       return $this->apiResponse(message:"Not found", status:404);
       }
   }
   public function getByCategory($id){
            try {
                $category = Category::findOrFail($id);
                $books = Book::where('category_id', $id )->paginate('10');
     return $this->apiResponse([
        'books' => BookResource::collection( $books ),
        "meta" => [
                    "total" => $books->total(),
                    "per_page" => $books->perPage(),
                    "cuurent_page" => $books->currentPage(),
                    "last_page" => $books->lastPage(),
                ],
                "links" => [
                    "first" => $books->url(1),
                    "last" => $books->url($books->lastPage()),
                    "prev" => $books->previousPageUrl(),
                    "next" => $books->nextPageUrl(),
                ],
        
     ]
   , message:"Book Returned Successfully"
    );
     
            }
            catch (\Exception $e){
            return $this->apiResponse(message:"Not Found", status:404);
            }

            
   }
}
