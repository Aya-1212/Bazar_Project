<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\MessageController;
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
Route::post('/v1/sign-up', [AuthController::class, "signUp" ]);
Route::post('/v1/sign-in', [AuthController::class, 'signIn']);

Route::middleware('auth:sanctum')->group(function(){
    // Logout
    Route::post('/v1/logout', [AuthController::class, 'logout']);
    // Store Message
    Route::post('/v1/send-message',[MessageController::class,'store']);
});


