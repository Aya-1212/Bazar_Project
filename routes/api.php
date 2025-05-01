<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\BookController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\MessageController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Auth
Route::post('/v1/sign-up', [AuthController::class, "signUp" ]);
Route::post('/v1/sign-in', [AuthController::class, 'signIn']);

Route::middleware('auth:sanctum')->group(function(){
    // Logout
    Route::post('/v1/logout', [AuthController::class, 'logout']);
    // Store Message
    Route::post('/v1/send-message',[MessageController::class,'store']);
});

 // Book 
Route::get('/v1/books', [BookController::class,'index']);
Route::get('/v1/books/{id}', [BookController::class,'show']);
Route::get('/v1/categories/{id}/books', [BookController::class,'getByCategory']);
Route::get('/v1/books/search', [BookController::class,'search']);
Route::get('/v1/book-slider',[BookController::class,'getSlider']);
Route::get('/v1/categories',[CategoryController::class,'index']);