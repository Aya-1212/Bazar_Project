@extends('admin.app')

@section('title', 'Order Details')

@section('content')
<div class="content-wrapper">
    <!-- Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">Order #
                        {{-- {{ $order->id }} --}}
                    </h1>
                    <p class="font-weight-normal" style="font-size: 1.2em;">Details of the selected order</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="content">
        <div class="container-fluid">
            <x-success-state />
            <x-error-state />

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <h5 class="mb-3">User Info</h5>
                            <ul>
                                <li><strong>Name:</strong>
                                     {{-- {{ $order->user->name }} --}}
                                    </li>
                                <li><strong>Email:</strong>
                                     {{-- {{ $order->user->email }} --}}
                                    </li>
                            </ul>

                            <h5 class="mt-4 mb-3">Order Info</h5>
                            <ul>
                                <li><strong>Status:</strong> 
                                    {{-- {{ $order->status }} --}}
                                </li>
                                <li><strong>Total Amount:</strong> 
                                    {{-- {{ $order->total_amount }} $ --}}
                                </li>
                                <li><strong>Payment Method:</strong>
                                     {{-- {{ $order->payment_method }} --}}
                                    </li>
                                <li><strong>Ordered At:</strong> 
                                    {{-- {{ $order->created_at->format('Y-m-d H:i') }} --}}
                                </li>
                            </ul>

                            <h5 class="mt-4 mb-3">Purchased Books</h5>
                            {{-- @if($order->bookCarts->isEmpty()) --}}
                                {{-- <p>No books in this order.</p> --}}
                            {{-- @else --}}
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered border-primary">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">#</th>
                                                <th style="text-align: center;">Book</th>
                                                <th style="text-align: center;">Qty</th>
                                                <th style="text-align: center;">Price</th>
                                                <th style="text-align: center;">Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($order->bookCarts as $cart) --}}
                                                <tr>
                                                    <td style="text-align: center;">
                                                        {{-- {{ $loop->iteration }} --}}
                                                    </td>
                                                    <td style="text-align: center;">
                                                        {{-- {{ $cart->book->title }} --}}
                                                    </td>
                                                    <td style="text-align: center;">
                                                        {{-- {{ $cart->quantity }}</td> --}}
                                                    <td style="text-align: center;">
                                                        {{-- {{ $cart->book->price_after_discount }} $ --}}
                                                    </td>
                                                    <td style="text-align: center;">
                                                        {{-- {{ $cart->sub_amount }} $ --}}
                                                    </td>
                                                </tr>
                                            {{-- @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                            {{-- @endif --}}

                            <a href="" class="btn btn-secondary mt-3">Back to Orders</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
