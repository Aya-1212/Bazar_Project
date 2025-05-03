<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Traits\FileSystem;
use App\Models\Book;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends ApiController
{
    use FileSystem;

    public function addToCart(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'book_id' => 'required|exists:books,id',
            ],
            [
                'book_id.required' => 'The book id is Required',
                'book_id.exists' => 'The Selected Book is not Exists',
            ]
        );

        if ($validator->fails()) {
            return $this->apiResponse(
                error: $validator->errors(),
                message: 'Unprocessed Request',
                status: 422
            );
        }

        $user = Auth::user();
        $cart = Cart::firstOrCreate(
            [
                'user_id' => $user->id,
            ]
        );

        $book = Book::where('id', $request->book_id)->first();

        if (!$cart->books()->where('book_id', $book->id)->exists()) {
            $cart->books()->attach($book->id, [
                'sub_total' => $book->price_after_discount ?? $book->price,
            ]);
        }

        $books = $cart->books()->withPivot([
            'sub_total',
            'quantity'
        ])->get();

        $total = $books->sum('pivot.sub_total');

        return $this->apiResponse([
            'data' => [
            'id' => $cart->id,
            'user' => [
                'user_id' => $user->id,
                'user_name' => $user->name,
            ],
            'total' => number_format($total, 2),
            'cart_books' => $books->map(function ($book) {
                return [
                    'book_id' => $book->id,
                    'book_title' => $book->title,
                    'book_image' => $this->getImageUrl('/books'."/".$book->image),  
                    'book_price' => number_format($book->price, 2),
                    'book_discount' => $book->discount ?? "",
                    'book_price_after_discount' => number_format($book->price_after_discount ?? 0, 2) ,
                    'book_stock_quatinty' => $book->stock_quantity,
                    'book_quantity' => $book->pivot->quantity,
                    'book_sub_total' => number_format($book->pivot->sub_total, 2),
                ];
            }),
        ],
        ]);

    }
}
