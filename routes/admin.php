<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
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
});

