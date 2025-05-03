@extends('admin.app')

@section('title', 'All Category')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 text-center">
                        <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">Orders</h1>
                        <p class="font-weight-normal" style="font-size: 1.2em;">List of all Orders from new to old</p>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- orders -->
        <section class="content">
            <div class="container-fluid">
                <x-success-state />
                <x-error-state />
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                @if (empty($orders->items()))
                                    <x-empty-state>{{ 'Orders' }}</x-empty-state>
                                @else
                                    <table class="table table-sm table-bordered border-primary "
                                        style="width: 100%; border: 1px solid #ddd;">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%; text-align: center; padding: 10px;">#</th>
                                                <th style="width: 20%; text-align: center; padding: 10px;">Status</th>
                                                <th style="width: 30%; text-align: center; padding: 10px;">Total Amount</th>
                                                <th style="width: 30%; text-align: center; padding: 10px;">Payment Method
                                                </th>
                                                <th style="width: 30%; text-align: center; padding: 10px;">User Id</th>
                                                <th style="width: 30%; text-align: center; padding: 10px;">Review Id</th>
                                                <th style="width: 30%; text-align: center; padding: 10px;">View</th>
                                                <th style="width: 20%; text-align: center; padding: 10px;">Edit</th>
                                                <th style="width: 20%; text-align: center; padding: 10px;">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td style="text-align: center; word-wrap: break-word;">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td style="text-align: center; word-wrap: break-word;">
                                                        {{ $order->status }}
                                                    </td>
                                                    <td style="text-align: center;">
                                                        {{ $order->total_amount }}
                                                    </td>
                                                    <td style="text-align: center;">
                                                        {{ $order->payment_method }}
                                                    </td>
                                                    <td style="text-align: center;">
                                                        {{ $order->user->id }}
                                                    </td>
                                                    <td style="text-align: center;">
                                                        {{ $order->review->id }}
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <a href="" class="btn btn-info">View</a>
                                                    </td>
                                                    <td style="text-align: center;">

                                                        <form action="#" method="POST">
                                                            {{-- @csrf --}}
                                                            {{-- @method('GET') --}}
                                                            <button class="btn btn-success">Edit</button>
                                                        </form>
                                                    </td>

                                                    <td style="text-align: center;">
                                                        <form action="" method="POST">
                                                            {{-- @csrf --}}
                                                            {{-- @method('DELETE') --}}
                                                            <button class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                {{-- {{ $orders->links() }} --}}
            </div>
        </section>
        <!-- end orders -->

    </div>
@endsection
