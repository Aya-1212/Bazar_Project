<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/sign-in', [AuthController::class, 'signIn'])->name('signin');
    Route::post('/sign-in', [AuthController::class, 'submitSignIn'])->name('signin.submit');
});

Route::prefix('/admin')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
    // Logout
    Route::delete('/logout',[AuthController::class,'logout'])->name('admin.logout');
    // Categories  //
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/add', [CategoryController::class, 'add'])->name('categories.add');
    Route::post('/categories',[CategoryController::class,'store'])->name('categories.store');
    Route::get('/categories/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class,'destroy'])->name('categories.destroy');
    // Publishers
    Route::get('/publishers', [PublisherController::class, 'index'])->name('publishers.index');
    Route::get('/publishers/add', [PublisherController::class, 'add'])->name('publishers.add');
    Route::get('/publishers/{publisher}', [PublisherController::class, 'edit'])->name('publishers.edit');

    // Messages
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    // Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'edit'])->name('orders.edit');
    // Books
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/add', [BookController::class, 'add'])->name('books.add');
    Route::get('/books/{book}', [BookController::class, 'edit'])->name('books.edit');
    // Users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/add', [UserController::class, 'add'])->name('users.add');
    // Reviews
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

});