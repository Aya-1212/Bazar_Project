@extends('admin.app')

@section('title', 'Add User')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="col-8 mx-auto">
                    <h1 class="font-weight-bold text-center" style="font-size: 2em; color: #007bff;">
                        Add User
                    </h1>
                    <form class="form border p-3" method="POST" action="{{ route('users.store') }}"
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
                            <label for="" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Phone <span style="color: red;">*</span></label>
                            <input type="tel" value="{{ old('phone') }}" name="phone" class="form-control">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">City <span style="color: red;">*</span></label>
                            <input type="text" value="{{ old('city') }}" name="city" class="form-control">
                            @error('city')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Address <span style="color: red;">*</span></label>
                            <input type="text" value="{{ old('address') }}" name="address" class="form-control">
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password <span style="color: red;">*</span></label>
                            <input type="password"  name="password" placeholder="********" class="form-control">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password Confirmation <span style="color: red;">*</span></label>
                            <input type="password"  name="password_confirmation"
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
