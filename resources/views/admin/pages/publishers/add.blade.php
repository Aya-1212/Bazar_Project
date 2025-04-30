@extends('admin.app')

@section('title', 'Add Publisher')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="col-8 mx-auto">
                    <h1 class="font-weight-bold text-center" style="font-size: 2em; color: #007bff;">
                        Add Publisher
                    </h1>
                    <x-success-state />
                    <form class="form border p-3" method="POST" action="{{ route('publishers.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label"> Name</label>
                            <input type="text" value="{{ old('name') }}" name="name" class="form-control">
                            @error('name') 
                                <span class="text-danger">{{ $message }}</span>
                             @enderror 
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label"> phone</label>
                            <input type="tel" value="{{ old('phone') }}" name="phone" class="form-control">
                            @error('phone') 
                                <span class="text-danger">{{ $message }}</span>
                             @enderror 
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label"> Email</label>
                            <input type="email" value="{{ old('email') }}" name="email" class="form-control">
                            @error('email') 
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
