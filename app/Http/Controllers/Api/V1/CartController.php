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
                'sub_amount' => $book->price_after_discount ?? $book->price,
            ]);
        }

        $books = $cart->books()->withPivot([
            'sub_amount',
            'quantity'
        ])->get();

        $total = $books->sum('pivot.sub_amount');
        $cart->total_price = $total;
        $cart->save();

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
                        'book_image' => $this->getImageUrl('/books' . "/" . $book->image),
                        'book_price' => number_format($book->price, 2),
                        'book_discount' => $book->discount ?? "",
                        'book_price_after_discount' => number_format($book->price_after_discount ?? 0, 2),
                        'book_stock_quatinty' => $book->stock_quantity,
                        'book_quantity' => $book->pivot->quantity,
                        'book_sub_amount' => number_format($book->pivot->sub_amount, 2),
                    ];
                }),
            ],
        ], "Book Added To Cart Successfully.");

    }

    public function updateQuantity(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'book_id' => 'required|exists:books,id',
                'quantity' => 'required|integer|min:1',
            ],
            [
                'book_id.required' => 'The book id is required',
                'book_id.exists' => 'The selected book does not exist',
                'quantity.required' => 'Quantity is required',
                'quantity.integer' => 'Quantity must be a number',
                'quantity.min' => 'Quantity must be at least 1',
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

        if ($request->quantity > $book->stock_quantity) {
            return $this->apiResponse(
                message: 'Not Enough Stock',
                status: 422
            );
        }

        $price = $book->price_after_discount ?? $book->price;

        if (!$cart->books()->where('book_id', $book->id)->exists()) {
            return $this->apiResponse(
                message: 'Book not found in the cart',
                status: 404
            );
        }

        $cart->books()->updateExistingPivot($book->id, [
            'quantity' => $request->quantity,
            'sub_amount' => $price * $request->quantity,
        ]);
        $books = $cart->books()->withPivot([
            'sub_amount',
            'quantity'
        ])->get();
        $total = $books->sum('pivot.sub_amount');
        $cart->total_price = $total;
        $cart->save();

        return $this->apiResponse(
            [
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
                            'book_image' => $this->getImageUrl('/books' . "/" . $book->image),
                            'book_price' => number_format($book->price, 2),
                            'book_discount' => $book->discount ?? "",
                            'book_price_after_discount' => number_format($book->price_after_discount ?? 0,
                             2),
                            'book_stock_quatinty' => $book->stock_quantity,
                            'book_quantity' => $book->pivot->quantity,
                            'book_sub_amount' => number_format($book->pivot->sub_amount, 2),
                        ];
                    }),
                ],
            ],
            message: 'Cart updated successfully'
        );

    }

    public function showCart()
    {
        $user = Auth::user();
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        $books = $cart->books()->withPivot(['quantity', 'sub_amount'])->get();

        return $this->apiResponse([
            'data' => [
                'cart_id' => $cart->id,
                'user' => [
                    'user_id' => $user->id,
                    'user_name' => $user->name,
                ],
                'total' => number_format($cart->total_price, 2),
                'cart_books' => $books->map(function ($book) {
                    return [
                        'book_id' => $book->id,
                        'book_title' => $book->title,
                        'book_image' => $this->getImageUrl('/books' . "/" . $book->image),
                        'book_price' => $book->price,
                        'book_discount' => $book->discount ?? "",
                        'book_price_after_discount' => $book->price_after_discount ?? 0,
                        'book_stock_quantity' => $book->stock_quantity,
                        'book_quantity' => $book->pivot->quantity,
                        'book_sub_amount' => $book->pivot->sub_amount,
                    ];
                }),
            ]
        ], "Cart books returned successfully");
    }


    public function removeFromCart(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'book_id' => 'required|exists:books,id',
            ],
            [
                'book_id.required' => 'The book id is required.',
                'book_id.exists' => 'The selected book does not exist.',
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

        $cart = Cart::where('user_id', $user->id)->first();

        if (!$cart) {
            return $this->apiResponse(
                message: 'Cart not found for the user.',
                status: 404
            );
        }

        $book = Book::find($request->book_id);

        if (!$cart->books()->where('book_id', $book->id)->exists()) {
            return $this->apiResponse(
                message: 'The selected book is not in your cart.',
                status: 422
            );
        }

        $cart->books()->detach($book->id);

        $books = $cart->books()->withPivot(['sub_amount', 'quantity'])->get();
        $total = $books->sum(fn($book) => $book->pivot->sub_amount);

        $cart->total_price = $total;
        $cart->save();

        return $this->apiResponse([
            'data' => [
                'cart_id' => $cart->id,
                'total' => $cart->total_price,
                'cart_books' => $books->map(function ($book) {
                    return [
                        'book_id' => $book->id,
                        'book_title' => $book->title,
                        'book_image' => $this->getImageUrl('/books' . "/" . $book->image),
                        'book_price' => $book->price,
                        'book_discount' => $book->discount ?? "",
                        'book_price_after_discount' => $book->price_after_discount ?? 0,
                        'book_stock_quantity' => $book->stock_quantity,
                        'book_quantity' => $book->pivot->quantity,
                        'book_sub_amount' => $book->pivot->sub_amount,
                    ];
                }),
            ],
        ], "Book Removed Successfully");
    }

}
