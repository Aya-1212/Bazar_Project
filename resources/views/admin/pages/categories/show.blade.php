@extends('admin.app')

@section('title', 'Category Info')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 text-center">
                        <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">
                            Category: {{ $category->name }}
                        </h1>
                        <p class="font-weight-normal" style="font-size: 1.2em;">
                            Detailed information about the category
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Category Info -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <strong>Name:</strong> {{ $category->title }}
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Image:</strong><br>
                                        @if ($category->image)
                                            <img src="{{ asset('upload/categories/' . $category->image) }}"
                                                alt="Category Image"
                                                class="img-fluid mt-2 rounded shadow"
                                                style="max-width: 250px;">
                                        @else
                                            <span class="text-muted">No image uploaded</span>
                                        @endif
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Created At:</strong> {{ $category->created_at->format('Y-m-d H:i') }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
