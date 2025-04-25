<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        return view('admin.pages.books.index');
       }
    
       public function edit(){
        return view('admin.pages.books.edit');
       }
    
       public function add(){
        return view('admin.pages.books.add');
       }
}
