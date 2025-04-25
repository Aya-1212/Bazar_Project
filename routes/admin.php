<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PublisherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

Route::prefix('admin')->group(function () {
    Route::get('/home',[HomeController::class,'index']);
    // Categories  //
    Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
    Route::get('/categories/add',[CategoryController::class,'add'])->name('categories.add');
    Route::get('/categories/{category}',[CategoryController::class,'edit'])->name('categories.edit');
    // Publishers
    Route::get('/publishers',[PublisherController::class,'index'])->name('publishers.index');
    Route::get('/publishers/add',[PublisherController::class,'add'])->name('publishers.add');
    Route::get('/publishers/{publisher}',[PublisherController::class,'edit'])->name('publishers.edit');    
 });

