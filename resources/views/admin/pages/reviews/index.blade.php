@extends('admin.app')

@section('title', 'All Reviews')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 text-center">
                        <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">Reviews</h1>
                        <p class="font-weight-normal" style="font-size: 1.2em;">List of all Reviews</p>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Reviews -->
        <section class="content">
            <div class="container-fluid">
                <x-success-state />
                <x-error-state />
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                @if (empty($reviews->items()))
                                    <x-empty-state>{{ 'Reviews' }}</x-empty-state>
                                @else
                                    <table class="table table-sm table-bordered border-primary "
                                        style="width: 100%; border: 1px solid #ddd;">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%; text-align: center; padding: 10px;">Id</th>
                                                <th style="width: 20%; text-align: center; padding: 10px;">Rating</th>
                                                <th style="width: 30%; text-align: center; padding: 10px;">Comment</th>
                                                <th style="width: 30%; text-align: center; padding: 10px;">User_Id</th>
                                                <th style="width: 30%; text-align: center; padding: 10px;">Order_Id</th>
                                                <th style="width: 20%; text-align: center; padding: 10px;">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reviews as $review)
                                                <tr>
                                                    <td style="text-align: center; word-wrap: break-word;">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td style="text-align: center; word-wrap: break-word;">
                                                        {{ $review->rating }}
                                                    </td>
                                                    <td style="text-align: center; word-wrap: break-word;">
                                                        {{ $review->comment }}
                                                    </td>
                                                    <td style="text-align: center; word-wrap: break-word;">
                                                       <a href="{{ route('users.show', $review->user->id) }}">
                                                        {{ $review->user_id }}
                                                                 </a>

                                                    </td>
                                                    <td style="text-align: center; word-wrap: break-word;">
                                                        <a href="{{ route('orders.show', $review->order->id) }}">
                                                            {{ $review->order->id }}
                                                        </a>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <form action="{{ route('reviews.destroy', $review->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
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
                {{ $reviews->links() }}
            </div>
        </section>
        <!-- end reviews -->

    </div>
@endsection
