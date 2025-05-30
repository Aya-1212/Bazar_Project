@extends('admin.app')

@section('title', 'Add Admin')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="col-8 mx-auto">
                    <h1 class="font-weight-bold text-center" style="font-size: 2em; color: #007bff;">
                        Add Admin
                    </h1>
                    <form class="form border p-3" method="POST" action="{{ route('admins.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Name <span style="color: red;">*</span></label>
                            <input type="text" value="{{ old('name') }}" name="name" class="form-control">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email <span style="color: red;">*</span></label>
                            <input type="email" value="{{ old('email') }}" name="email" class="form-control">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password <span style="color: red;">*</span></label>
                            <input type="password" value="{{ old('password') }}" name="password" class="form-control" placeholder="********">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password Confirmation <span style="color: red;">*</span></label>
                            <input type="password" value="{{ old('password_confirmation') }}" name="password_confirmation"
                                class="form-control" placeholder="********">
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
