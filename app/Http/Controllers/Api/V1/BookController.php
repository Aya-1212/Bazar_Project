<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends ApiController
{
    
    public function index()
    {
        $books = Book::paginate('10');
        return $this->apiResponse(
            [
                'books' => BookResource::collection($books),
                "meta" => [
                    "total" => $books->total(),
                    "per_page" => $books->perPage(),
                    "current_page" => $books->currentPage(),
                    "last_page" => $books->lastPage(),
                ],
                "links" => [
                    "first" => $books->url(1),
                    "last" => $books->url($books->lastPage()),
                    "prev" => $books->previousPageUrl(),
                    "next" => $books->nextPageUrl(),
                ],

            ]
            ,
            message: "Book Returned Successfully"
        );


    }
    
    public function show($id)
    {
        try {
            $book = Book::findOrFail($id);
            return $this->apiResponse(
                [
                    'book' => new BookResource($book),

                ],
                message: "Book Returned Successfully"

            );
        } catch (\Exception $e) {
            return $this->apiResponse(message: "Not found", status: 404);
        }
    }

    public function getByCategory($id)
    {
        try {
            $category = Category::findOrFail($id);
            $books = Book::where('category_id', $id)->paginate('10');
            return $this->apiResponse(
                [
                    'books' => BookResource::collection($books),
                    "meta" => [
                        "total" => $books->total(),
                        "per_page" => $books->perPage(),
                        "current_page" => $books->currentPage(),
                        "last_page" => $books->lastPage(),
                    ],
                    "links" => [
                        "first" => $books->url(1),
                        "last" => $books->url($books->lastPage()),
                        "prev" => $books->previousPageUrl(),
                        "next" => $books->nextPageUrl(),
                    ],

                ]
                ,
                message: "Book Returned Successfully"
            );

        } catch (\Exception $e) {
            return $this->apiResponse(message: "Not Found", status: 404);
        }
    }

    public function search (Request $request){
        $query = trim($request->query('title'));
    
        if (empty($query)) {
            return $this->apiResponse(message: 'Search query is empty.', status: 400);
        }
    
              $books = Book::where('title','like','%'.$query.'%')
              ->orWhere('author','like','%'.$query.'%')
              ->paginate('10');
              if ($books->isEmpty()) {
                return $this->apiResponse(
                    message: 'No books found matching your search.', status: 201);
              }
                    
        
              return $this->apiResponse([
                'books' => BookResource::collection( $books ),
                "meta" => [
                            "total" => $books->total(),
                            "per_page" => $books->perPage(),
                            "current_page" => $books->currentPage(),
                            "last_page" => $books->lastPage(),
                        ],
                        "links" => [
                            "first" => $books->url(1),
                            "last" => $books->url($books->lastPage()),
                            "prev" => $books->previousPageUrl(),
                            "next" => $books->nextPageUrl(),
                        ],
                
             ]
           , message:"Book Returned Successfully" );
           
    }

    public function sale()
    {
        $books = Book::where('discount', '>=', 40)->paginate('10');
        return $this->apiResponse(
            [
                'books' => BookResource::collection($books),
                "meta" => [
                    "total" => $books->total(),
                    "per_page" => $books->perPage(),
                    "current_page" => $books->currentPage(),
                    "last_page" => $books->lastPage(),
                ],
                "links" => [
                    "first" => $books->url(1),
                    "last" => $books->url($books->lastPage()),
                    "prev" => $books->previousPageUrl(),
                    "next" => $books->nextPageUrl(),
                ],
            ]
            ,
            message: "Book Returned Successfully"
        );

    }

    public function getSlider()
    {
        $books = Book::limit(5)->get();
        return $this->apiResponse([
            'slider' => BookResource::collection($books),
        ], message: 'Books Returned Successfully');
    }
    
    public function filter(Request $request)
    {
        $query = trim($request->query('price'));

        if (empty($query)) {
            return $this->apiResponse(message: 'Search query is empty.', status: 400);
        }

        $books = Book::where('price', '>=', $query)
            ->paginate('10');

        if ($books->isEmpty()) {
            return $this->apiResponse(
                message: 'No books are founded.',
                status: 201
            );
        }

        return $this->apiResponse(
            [
                'books' => BookResource::collection($books),
                "meta" => [
                    "total" => $books->total(),
                    "per_page" => $books->perPage(),
                    "current_page" => $books->currentPage(),
                    "last_page" => $books->lastPage(),
                ],
                "links" => [
                    "first" => $books->url(1),
                    "last" => $books->url($books->lastPage()),
                    "prev" => $books->previousPageUrl(),
                    "next" => $books->nextPageUrl(),
                ],

            ]
            ,
            message: "Books Returned Successfully"
        );
    }
    
    public function getByPublisher($id)
    {
        try {
            $publisher = Publisher::findOrFail($id);
            $books = Book::where("publisher_id", $id)->paginate('10');
            return $this->apiResponse(
                [
                    'books' => BookResource::collection($books),
                    "meta" => [
                        "total" => $books->total(),
                        "per_page" => $books->perPage(),
                        "current_page" => $books->currentPage(),
                        "last_page" => $books->lastPage(),
                    ],
                    "links" => [
                        "first" => $books->url(1),
                        "last" => $books->url($books->lastPage()),
                        "prev" => $books->previousPageUrl(),
                        "next" => $books->nextPageUrl(),
                    ],

                ]
                ,
                message: "Book Returned Successfully"
            );
        } catch (\Exception $e) {
            return $this->apiResponse(message: "Publisher Not Found", status: 404);
        }
    }

}