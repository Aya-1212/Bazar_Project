<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Book;
use App\Models\Category;
use App\Models\Message;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $users = User::count();
        $categories = Category::count();
        $publishers = Publisher::count();
        $books = Book::count();
        $admins = Admin::count();
        $messages = Message::count();
        return view('admin.pages.index',compact([
            'users','categories','publishers','books','admins','messages'
        ]));
    }
}
