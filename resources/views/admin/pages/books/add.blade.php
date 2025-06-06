@extends('admin.app')

@section('title', 'Add Books')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="col-8 mx-auto">
                    <h1 class="font-weight-bold text-center" style="font-size: 2em; color: #007bff;">
                        Add Book
                    </h1>
                    <x-success-state />
                    <form class="form border p-3" method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Book Name <span style="color: red;">*</span></label>
                            <input type="text" value="{{ old('title') }}" name="title" class="form-control">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">ISBN <span style="color: red;">*</span></label>
                            <input type="text" value="{{ old('isbn_code') }}" name="isbn_code" class="form-control">
                            @error('isbn_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Image <span style="color: red;">*</span></label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Description <span style="color: red;">*</span></label>
                            <input type="text" value="{{ old('description') }}" name="description" class="form-control">
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Author <span style="color: red;">*</span></label>
                            <input type="text" value="{{ old('author') }}" name="author" class="form-control">
                            @error('author')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Price <span style="color: red;">*</span></label>
                            <input type="text" value="{{ old('price') }}" name="price" class="form-control">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Discount</label>
                            <input type="text" value="{{ old('discount') }}" name="discount" class="form-control">
                            @error('discount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Price After Discount </label>
                            <input type="text" value="{{ old('price_after_discount') }}" name="price_after_discount" class="form-control">
                            @error('price_after_discount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Stock Quantity <span style="color: red;">*</span></label>
                            <input type="text" value="{{ old('stock_quantity') }}" name="stock_quantity" class="form-control">
                            @error('stock_quantity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Categories <span style="color: red;">*</span></label>
                            <select name="category_id">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Publishers <span style="color: red;">*</span></label>
                            <select name="publisher_id">
                                @foreach ($publishers as $publisher)
                                <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Add" class="form-control text-white bg-success">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection
