<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Traits\FileSystem;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends ApiController
{
    use FileSystem;
    public function checkout()
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
        ], "Checkout Details Returned Successfully ");
    }
    public function placeOrder(Request $request)
    {
        $user = Auth::user();
        if ($user->city == null || $user->phone == null || $user->address == null) {
            return $this->apiResponse(
                message: 'You Must Complete your profile information first',
                status: 422,
            );
        }
        $cart = Cart::with([
            'books' => function ($query) {
                $query->select('books.id', 'books.title')
                    ->withPivot('quantity', 'sub_amount');
            }
        ])
            ->where('user_id', $user->id)
            ->first();
        if (!$cart || $cart->total_price == 0) {
            return $this->apiResponse(
                message: 'No cart found for this user.',
                status: 404
            );
        }


        DB::beginTransaction();

        try {
            $order = Order::create([
                'user_id' => $user->id,
                'total_amount' => $cart->total_price,

            ]);

            foreach ($cart->books as $book) {

                $order->books()->attach($book->id, [
                    'quantity' => $book->pivot->quantity,
                    'sub_total' => $book->pivot->sub_amount,
                    'order_id' => $order->id,

                ]);
            }
            $cart->books()->detach();
            $cart->total_price = 0;
            $cart->save();

            DB::commit();

            return $this->apiResponse(
                [
                    $order->load('books'),
                ],
                message: 'Order placed successfully.',
            );

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->apiResponse(
                error: $e->getMessage(),
                message: "Something Went Wrong",
                status: 500
            );
        }
    }
    public function orderHistory(Request $request)
    {
        $user = Auth::user();
        $data = $request->query();
        $validator = Validator::make(
            $data,
            [
                'status' => 'required|string|exists:orders,status',
            ],
            [
                'status.required' => 'The status field is required.',
                'status.string' => 'The status must be a string.',
                'status.exists' => 'The selected status is invalid. Please choose a valid status from the available options.',
            ]
        );
        if ($validator->fails()) {
            return $this->apiResponse(
                $error = $validator->errors(),
                $message = "Something Went Wrong",
                status: 400
            );
        }

        $orders = Order::with('books')->where("user_id", $user->id)
            ->where('status', $data['status'])->get();
        $formattedOrders = $orders->map(function ($order) {
            $books = $order->books->map(function ($book) {
                return [
                    'title' => $book->title,
                    'image' => $book->image,
                    'price' => $book->price,
                    'price_after_discount' => $book->price_after_discount, // Can be null if not applicable
                    'quantity' => $book->pivot->quantity,
                    'sub_total' => $book->pivot->sub_amount,
                ];
            });

            return [
                'order_id' => $order->id,
                'status' => $order->status,
                'total_amount' => $order->total_amount,
                'payment_method' => $order->payment_method,
                'created_at' => $order->created_at,
                'updated_at' => $order->updated_at,
                'books' => $books,
            ];
        });
        return $this->apiResponse(
            $orders,
            $message = "Books Returned Successfully",
        );
    }
    public function showSingleOrder(Request $request){
        $user = Auth::user();
        $data = $request->query();
        $validator = Validator::make(
            $data,
            [
                'order_id' => 'required|exists:orders,id',
            ],
            [
                'order_id.required' => 'The order id field is required.',
                'order_id.exists' => 'The selected order id is invalid',
            ]
        );
        if ($validator->fails()) {
            return $this->apiResponse(
                $error = $validator->errors(),
                $message = "Something Went Wrong",
                status: 400
            );
        }
        $order = Order::with('books')->where("user_id", $user->id)
        ->where('id', $data['order_id'])->get();
    $formattedOrder = $order->map(function ($order) {
        $books = $order->books->map(function ($book) {
            return [
                'title' => $book->title,
                'image' => $book->image,
                'price' => $book->price,
                'price_after_discount' => $book->price_after_discount, 
                'quantity' => $book->pivot->quantity,
                'sub_total' => $book->pivot->sub_amount,
            ];
        });

        return [
            'order_id' => $order->id,
            'status' => $order->status,
            'total_amount' => $order->total_amount,
            'payment_method' => $order->payment_method,
            'created_at' => $order->created_at,
            'updated_at' => $order->updated_at,
            'books' => $books,
        ];
    });
    return $this->apiResponse(
        $order,
        $message = "Books Returned Successfully",
    );
    }
    
}
