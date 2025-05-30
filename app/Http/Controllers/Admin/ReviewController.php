<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Exception;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('order')->paginate(10);
        return view('admin.pages.reviews.index', compact('reviews'));
    }

    public function show(Review $review)
    {
        try {
         $review = Review::with(['user', 'order'])->findOrFail($review->id);
            return view('admin.pages.reviews.show', compact('review'));
        } catch (Exception $e) {
            return to_route('reviews.index')->with('error', 'No Such Review');

        }
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return to_route('reviews.index')->with('success', 'Review Deleted Successfully');
    }
}
