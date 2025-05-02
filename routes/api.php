<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\BookController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\MessageController;

use App\Http\Controllers\Api\V1\PublisherController;
use App\Http\Controllers\Api\V1\UserController;
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


    Route::middleware('auth:sanctum')->prefix('v1')->group(function(){
    
        // Logout
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Store Message
    Route::post('/send-message',[MessageController::class,'store']);
    
    // Profile
    Route::get('/profile',[UserController::class,'showProfile']);
    Route::post('/update-profile',[UserController::class,'updateProfile']);
    Route::post('/update-password',[UserController::class,'updatePassword']);
    Route::post('/delete-profile',[UserController::class,'deleteUser']);
});

 // Book 
Route::get('/v1/books', [BookController::class,'index']);
Route::get('/v1/books/{id}', [BookController::class,'show']);
Route::get('/v1/categories/{id}/books', [BookController::class,'getByCategory']);

Route::get('/v1/books/search', [BookController::class,'search']);
Route::get('/v1/book-slider',[BookController::class,'getSlider']);
Route::get('/v1/categories',[CategoryController::class,'index']);

Route::get('/v1/books-sale', [BookController::class,'sale']);
Route::get('/v1/books-filter', [BookController::class,'filter']);
Route::get('/v1/publishers/{id}/books', [BookController::class,'getByPublisher']);

// Publisher 
Route::get('/v1/publishers', [PublisherController::class,'index']);
