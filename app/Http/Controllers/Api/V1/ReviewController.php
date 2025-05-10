<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends ApiController
{
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'order_id' => 'required|exists:orders,id',
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'required|string|min:30|max:500',
            ],
            [
                'order_id.required' => 'The order ID is required.',
                'order_id.exists' => 'The selected order does not exist.',
                'rating.required' => 'Rating is required.',
                'rating.integer' => 'Rating must be a number.',
                'rating.min' => 'Rating must be at least 1.',
                'rating.max' => 'Rating must not be greater than 5.',
                'comment.required' => 'Comment is required.',
                'comment.string' => 'Comment must be text.',
                'comment.min' => 'Comment must be at least 30 characters.',
                'comment.max' => 'Comment must not be greater than 500 characters.',
            ],
        );
        if ($validator->fails()) {
            return $this->apiResponse(
                $error = $validator->errors(),
                $message = "Something Went Wrong",
                status: 400
            );
        }
        $user = Auth::user();

        $order = Order::where('id', $request->order_id)
            ->where('user_id', $user->id)->first();

        if ($order && $order->review_id !== null) {
            return $this->apiResponse(
                message: 'You have already reviewed this order.',
                status: 409
            );
        }

        $review = new Review();
        $review->user_id = $user->id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->save();

        $order->review_id = $review->id;
        $order->save();

        return $this->apiResponse(
            message: 'Review added to order successfully.'
        );

    }
}
