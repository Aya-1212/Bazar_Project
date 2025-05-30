@extends('admin.app')

@section('title', 'Order Details')

@section('content')
    <div class="content-wrapper">
        <!-- Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 text-center">
                        <h1 class="font-weight-bold text-primary">Review #{{ $review->id }}</h1>
                        <p class="lead">Review Details of the selected order</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <!-- User Info -->
                        <h5 class="mb-3">User Info</h5>
                        <ul>
                            <li><strong>Name:</strong> {{ $review->user->name }}</li>
                            <li><strong>Email:</strong> {{ $review->user->email }}</li>
                            <li><strong>Phone:</strong> {{ $review->user->phone }}</li>
                        </ul>
                        <!-- Review -->
                        <h5 class="mt-4 mb-3">Review</h5>
                        @if (!empty($review))
                            <div class="border p-3 rounded bg-light">
                                <p><strong>Rating:</strong> {{ $review->rating }} / 5</p>
                                <p><strong>Comment:</strong> {{ $review->comment }}</p>
                                <p><strong>Reviewed At:</strong> {{ $review->created_at->format('Y-m-d H:i') }}</p>
                            </div>
                        @else
                            <p class="text-muted">No review submitted for this order.</p>
                        @endif
                        <h5 class="mt-4 mb-3">Order Info</h5>
                        <ul>
                            <li><strong>Order ID:</strong> {{ $order->id }}</li>
                            <li><strong>Status:</strong> {{ $order->status }}</li>
                            <li><strong>Total Amount:</strong> {{ $order->total_amount }} $</li>
                            <li><strong>Payment Method:</strong> {{ $order->payment_method }}</li>
                            <li><strong>Ordered At:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
