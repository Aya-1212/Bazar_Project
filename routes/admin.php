<?php

use App\Http\Controllers\Admin\AdminController;
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

Route::prefix('dashboard')->group(function () {
    Route::get('/sign-in', [AuthController::class, 'signIn'])->name('admin.signin');
    Route::post('/sign-in', [AuthController::class, 'submitSignIn'])->name('admin.signin.submit');
});

Route::middleware('verify.admin')->prefix('/dashboard')->group(function () {


    /* 
    
    Auhenticated Admin
    
    */
    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('admin.logout');



    /* 
                                                     
    Admin CRUD

    */
    Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
    Route::get('/admins/add', [AdminController::class, 'add'])->name('admins.add');
    Route::post('/admins', [AdminController::class, 'store'])->name('admins.store');
    Route::get('/admins/{admin}', [AdminController::class, 'edit'])->name('admins.edit');
    Route::put('/admins/{admin}', [AdminController::class, 'update'])->name('admins.update');
    Route::delete('/admins/{admin}', [AdminController::class, 'destroy'])->name('admins.destroy');


    /*
    
    Categories CRUD
    
    */
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/add', [CategoryController::class, 'add'])->name('categories.add');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');


    /*
    Publishers CRUD

    */
    Route::get('/publishers', [PublisherController::class, 'index'])->name('publishers.index');
    Route::get('/publishers/add', [PublisherController::class, 'add'])->name('publishers.add');
    Route::get('/publishers/{publisher}', [PublisherController::class, 'edit'])->name('publishers.edit');
    Route::post('/publishers', [PublisherController::class, 'store'])->name('publishers.store');
    Route::get('/publishers/{publisher}', [PublisherController::class, 'edit'])->name('publishers.edit');
    Route::put('/publishers/{publisher}', [PublisherController::class, 'update'])->name('publishers.update');
    Route::delete('/publishers/{publisher}', [PublisherController::class, 'destroy'])->name('publishers.destroy');


    /*
    
    Messages CRUD
    
    */
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');


    /* 
    
    Orders CRUD
    
    */
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'edit'])->name('orders.edit');


    /*
    
    Books CRUD
    
    */
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/add', [BookController::class, 'add'])->name('books.add');
    Route::get('/books/{book}', [BookController::class, 'edit'])->name('books.edit');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/{book}', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');


    /*
    
    Users CRUD
    
    */
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/add', [UserController::class, 'add'])->name('users.add');
    Route::post('/users',[UserController::class,'store'])->name('users.store');
    Route::delete('/users' , [UserController::class, 'destroy'])->name('users.destroy');


    /*
    
    Reviews CRUD
    
    */
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');


});

Route::get('/view',function (){
    return view('admin.pages.orders.view');
} );