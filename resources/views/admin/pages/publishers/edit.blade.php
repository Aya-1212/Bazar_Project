@extends('admin.app')

@section('title', 'Edit Publisher')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="col-8 mx-auto">
                    <h1 class="font-weight-bold text-center" style="font-size: 2em; color: #007bff;">
                        Edit Publisher
                    </h1>
                    <x-success-state />
                    <form class="form border p-3" method="POST" action="{{ route('publishers.update', $publisher->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT') 
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{ $publisher->name }}" class="form-control" required>
                            @error('name') 
                                <span class="text-danger">{{ $message }}</span>
                           @enderror 
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="text" name="phone" value="{{ $publisher->phone }}" class="form-control" required>
                            @error('phone') 
                                <span class="text-danger">{{ $message }}</span>
                           @enderror 
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" value="{{ $publisher->email }}" class="form-control" required>
                            @error('email') 
                                <span class="text-danger">{{ $message }}</span>
                           @enderror 
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Update" class="form-control text-white bg-success">
                        </div>
                        </div>

                        
                    </form>

                </div>
            </div>
        </section>
    </div>

@endsection
