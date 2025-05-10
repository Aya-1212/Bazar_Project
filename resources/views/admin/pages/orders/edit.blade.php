@extends('admin.app')

@section('title', 'Edit Order')

@section('content')
    <div class="content-wrapper">
        <!-- Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 text-center">
                        <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">Edit Order #{{ $order->id }}
                        </h1>
                        <p class="font-weight-normal" style="font-size: 1.2em;">Change the order status</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('orders.update', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-body">

                                    <h5 class="mb-3">User Info</h5>
                                    <ul>
                                        <li><strong>Name:</strong>
                                            {{ $order->user->name }}
                                        </li>
                                        <li><strong>Email:</strong>
                                            {{ $order->user->email }}
                                        </li>
                                        <li><strong>Phone:</strong>
                                            {{ $order->user->phone }}
                                        </li>
                                        <li><strong>City:</strong>
                                            {{ $order->user->city }}
                                        </li>
                                        <li><strong>Address:</strong>
                                            {{ $order->user->address }}
                                        </li>
                                    </ul>
                                    <h5 class="mt-4 mb-3">Order Info</h5>
                                    <ul>
                                        <li><strong>Status:</strong>
                                            <select name="status" class="form-control w-25 d-inline-block">
                                                <option value="pending"
                                                    {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="processed"
                                                    {{ $order->status === 'processed' ? 'selected' : '' }}>Processed
                                                </option>
                                                <option value="shipped"
                                                    {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                                                <option value="completed"
                                                    {{ $order->status === 'completed' ? 'selected' : '' }}>Completed
                                                </option>
                                            </select>
                                        </li>
                                        <li><strong>Total Amount:</strong>
                                            {{ $order->total_amount }} $
                                        </li>
                                        <li><strong>Payment Method:</strong>
                                            {{ $order->payment_method }}
                                        </li>
                                        <li><strong>Ordered At:</strong>
                                            {{ $order->created_at->format('Y-m-d H:i') }}
                                        </li>
                                    </ul>

                                    <h5 class="mt-4 mb-3">Purchased Books</h5>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-bordered border-primary">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;">#</th>
                                                    <th style="text-align: center;">Book_Id</th>
                                                    <th style="text-align: center;">Title</th>
                                                    <th style="text-align: center;">isbn_code</th>
                                                    <th style="text-align: center;">Image</th>
                                                    <th style="text-align: center;">Qty</th>
                                                    <th style="text-align: center;">Price</th>
                                                    <th style="text-align: center;">Sub Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->books as $book)
                                                    <tr>
                                                        <td style="text-align: center;">
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td style="text-align: center;">
                                                            {{ $book->id }}
                                                        </td>
                                                        <td style="width: 25%;text-align: center;">
                                                            {{ $book->title }}</td>
                                                        <td style="text-align: center;">
                                                            {{ $book->isbn_code }}
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <img src="{{ asset('upload/books') . '/' . $book->image }}"
                                                                alt="=book" class="img-fluid " height="100"
                                                                width="120">
                                                        </td>
                                                        <td style="text-align: center;">
                                                            {{ $book->pivot->quantity }}
                                                        </td>
                                                        <td style="text-align: center;">
                                                            @if ($book->price_after_discount !== null && $book->price > $book->price_after_discount)
                                                                {{ $book->price_after_discount . " $" }}
                                                            @else
                                                                {{ $book->price . " $" }}
                                                            @endif
                                                        </td>
                                                        <td style="text-align: center;">
                                                            {{ $book->pivot->sub_total . " $" }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary btn-block w-100"
                                            style="font-size: 1.1em;">Update Status</button>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
