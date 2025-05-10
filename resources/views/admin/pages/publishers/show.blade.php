@extends('admin.app')

@section('title', 'Publisher Info')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 text-center">
                        <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">Publisher: {{ $publisher->name }}</h1>
                        <p class="font-weight-normal" style="font-size: 1.2em;">Detailed information about the publisher</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Publisher Info -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Name:</strong> {{ $publisher->name }}</li>
                                    <li class="list-group-item"><strong>Email:</strong> {{ $publisher->email }}</li>
                                    <li class="list-group-item"><strong>Phone:</strong> {{ $publisher->phone }}</li>
                                    <li class="list-group-item"><strong>Created At:</strong> {{ $publisher->created_at->format('Y-m-d H:i') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
