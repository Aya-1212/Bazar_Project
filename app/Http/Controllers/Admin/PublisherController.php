<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index(){
        return view('admin.pages.publishers.index');
       }
    
       public function edit(){
        return view('admin.pages.publishers.edit');
       }
    
       public function add(){
        return view('admin.pages.publishers.add');
       }
}
