<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    // public function showOrdersDate(){
    //     $dates = Order::selectRaw('DATE(created_at) as order_date')
    //     ->distinct()
    //     ->orderBy('order_date', 'desc')
    //     ->pluck('order_date');
    // }

    public function index(){
        $orders = Order::orderBy('created_at')->with([
            'user','review'
        ])->paginate('10');
        return view('admin.pages.orders.index',compact('orders'));
       }
    
       public function edit(){
        return view('admin.pages.orders.edit');
       }
    
      
}
