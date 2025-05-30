@extends('admin.app')

@section('title', 'All Books')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 text-center">
                        <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">Books</h1>
                        <p class="font-weight-normal" style="font-size: 1.2em;">List of all Registered Books</p>
                        <a href="{{ route('books.add') }}" class="btn btn-primary position-absolute"
                            style="top: 0; right: 0;">Add Book</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Books -->
        <section class="content">
            <div class="container-fluid">
                <x-success-state />
                <x-error-state />
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body p-0 table-responsive">
                                @if (empty($books->items()))
                                    <x-empty-state>{{ 'Books' }}</x-empty-state>
                                @else
                                    <table class="table table-sm table-bordered border-primary "
                                        style="width: 100%; border: 1px solid #ddd;">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center; padding: 10px;">Id</th>
                                                <th style="width: 30%;width: 30%; text-align: center; padding: 10px;">Title</th>
                                                <th style="text-align: center; padding: 10px;">Image</th>
                                                <th style="width: 40%; text-align: center; padding: 10px;">Description</th>
                                                <th style="text-align: center; padding: 10px;">Author</th>
                                                <th style="width: 10%;text-align: center; padding: 10px;">Price</th>
                                                <th style="width: 10%;text-align: center; padding: 10px;">Discount</th>
                                                <th style="text-align: center; padding: 10px;">Price After
                                                    Discount</th>
                                                <th style="width: 10%;text-align: center; padding: 10px;">Stock Quantity
                                                </th>
                                                <th style="text-align: center; padding: 10px;">ISBN</th>
                                                <th style="text-align: center; padding: 10px;">Category_Id</th>
                                                <th style="text-align: center; padding: 10px;">Publisher_Id</th>
                                                <th style="text-align: center; padding: 10px;">Edit</th>
                                                <th style="text-align: center; padding: 10px;">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($books as $book)
                                                <tr>
                                                    <td style="text-align: center; word-wrap: break-word;">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td style="text-align: center; word-wrap: break-word;">
                                                        {{ $book->title }}
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <img src="{{ asset('upload/books') . '/' . $book->image }}"
                                                            alt="=book" class="img-fluid " height="100" width="120">
                                                    </td>
                                                    <td style="text-align: center; word-wrap: break-word;">
                                                        {{ \Illuminate\Support\Str::limit($book->description, 150, '...') }}
                                                    </td>
                                                    <td style="text-align: center; word-wrap: break-word;">
                                                        {{ $book->author }}
                                                    </td>
                                                    <td style="text-align: center; word-wrap: break-word;">
                                                        {{ $book->price }} EGP
                                                    </td>
                                                    <td style="text-align: center; word-wrap: break-word;">
                                                        @if (isset($book->discount))
                                                             {{ $book->discount }}%
                                                        @else
                                                           {{ 'N/A' }} 
                                                        @endif
                                                       
                                                    </td>

                                                    <td style="text-align: center; word-wrap: break-word;">
                                                        @if (isset($book->price_after_discount))
                                                             {{ $book->price_after_discount }} EGP
                                                        @else
                                                            
                                                        {{'N/A'  }}
                    
                                                        @endif
                                                       
                                                    </td>
                                                    <td style="text-align: center; word-wrap: break-word;">
                                                        {{ $book->stock_quantity }}
                                                    </td>
                                                    <th style="text-align: center; padding: 10px;">{{ $book->isbn_code }}</th>
                                                    <td style="text-align: center; word-wrap: break-word;">
                                                        {{ $book->category_id }}
                                                    </td>
                                                    <td style="text-align: center; word-wrap: break-word;">
                                                        <a href="{{ route('publishers.show', $book->publisher->id) }}">
                                                            {{ $book->publisher_id }}
                                                        </a>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <a class="btn btn-success"
                                                            href="{{ route('books.edit', $book->id) }}">Edit</a>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <form action="{{ route('books.destroy', $book->id) }}"
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
                {{ $books->links() }}
            </div>
        </section>
        <!-- end books -->

    </div>
@endsection
