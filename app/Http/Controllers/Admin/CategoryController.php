<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function index(){
    return view('admin.pages.categories.index');
   }

   public function edit(){
    return view('admin.pages.categories.edit');
   }

   public function add(){
    return view('admin.pages.categories.add');
   }
}
