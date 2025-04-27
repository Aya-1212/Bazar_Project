@extends('admin.app')

@section('title', 'Edit Book')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="col-8 mx-auto">
                    <h1 class="font-weight-bold text-center" style="font-size: 2em; color: #007bff;">
                        Edit Book
                    </h1>
                    <form class="form border p-3" method="POST" action="{{ route('books.update', $book->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="title" value="{{ $book->title }}" class="form-control" required>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <img src="{{ asset('upload/books'.'/'.$book->image) }}" alt="book" class="img-fluid " height="200" width="200">
                            </div>
                            <div class="mb-3">
                                <label for="image">Upload Image</label>
                                <input type="file" name="image" value="" class="form-control">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <input type="text" name="description" value="{{ $book->description }}" class="form-control" required>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    
                        </div>
                        <div class="mb-3">
                            <label for="">Author</label>
                            <input type="text" name="author" value="{{ $book->author }}" class="form-control" required>
                            @error('author')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    
                        </div>
                        <div class="mb-3">
                            <label for="">Price</label>
                            <input type="text" name="price" value="{{ $book->price }}" class="form-control" required>
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    
                        </div>
                        <div class="mb-3">
                            <label for="">Discount</label>
                            <input type="text" name="discount" value="{{ $book->discount }}" class="form-control">
                            @error('discount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    
                        </div>
                        <div class="mb-3">
                            <label for="">Price after Discount</label>
                            <input type="text" name="price_after_discount" value="{{ $book->price_after_discount }}" class="form-control" required>
                            @error('price_after_discount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    
                        </div>
                        <div class="mb-3">
                            <label for="">Stock Quantity</label>
                            <input type="text" name="stock_quantity" value="{{ $book->stock_quantity }}" class="form-control" required>
                            @error('stock_quantity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    
                        </div>
                        <div class="mb-3">
                            <label for="">Category Id</label>
                            <input type="text" name="category_id" value="{{ $book->category_id }}" class="form-control" required>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    
                        </div>
                        <div class="mb-3">
                            <label for="">Publisher Id</label>
                            <input type="text" name="publisher_id" value="{{ $book->publisher_id }}" class="form-control" required>
                            @error('publisher_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Update" class="form-control text-white bg-success">
                        </div>
                    </form>

                </div>
            </div>
        </section>
    </div>

@endsection
