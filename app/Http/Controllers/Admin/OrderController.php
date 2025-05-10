<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\EditOrderRequest;
use App\Models\Order;
use Exception;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::orderBy('created_at')->with([
            'user',
            'review'
        ])->paginate('10');
        return view('admin.pages.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        try {
            $order = Order::findOrFail($order->id);
            $order->load([
                'user',
                'books',
            ]);
            return view('admin.pages.orders.show', compact('order'));
        } catch (Exception $e) {
            return to_route('orders.index')->with('errors', 'No Such Order');
        }
    }

    public function edit(Order $order)
    {
        try {
            $order = Order::findOrFail($order->id);
            $order->load([
                'user',
                'books'
            ]);
            return view('admin.pages.orders.edit', compact('order'));
        } catch (Exception $e) {
            return to_route('orders.index')->with('errors', 'No Such Order');
        }
    }

    public function update(EditOrderRequest $request, Order $order)
    {
        $order = Order::where('id', $order->id)->first();
        if ($order) {
            $order->status = $request->status;
            $order->save();
            return to_route('orders.index')->with('success', 'Successfully Edited Order Status');

        }
        return to_route('orders.index')->with('errors', 'No Such Order');

    }


    public function destroy(Order $order)
    {
        try {
            $order = Order::findOrFail($order->id);
            $order->delete();
            return to_route('orders.index')->with('success', 'Order Deleted Successfully');
        } catch (Exception $e) {
            return to_route('orders.index')->with('errors', 'No Such Order');
        }
    }


}
