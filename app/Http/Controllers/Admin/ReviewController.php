<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with([
            'order', 
            'user',
        ])->paginate(10);
        return view('admin.pages.reviews.index', compact('reviews'));
    }
    
    public function destroy(Review $review) {
         $review->delete();
         return to_route('reviews.index')->with('success','Review Deleted Successfully');
    }
}
