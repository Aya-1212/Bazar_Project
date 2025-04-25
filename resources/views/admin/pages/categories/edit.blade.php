@extends('admin.app')

@section('title', 'Edit Category')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="col-8 mx-auto">
                    <h1 class="font-weight-bold text-center" style="font-size: 2em; color: #007bff;">
                        Edit Category
                    </h1>
                    <x-success />
                    <form class="form border p-3" method="POST" action=""
                        enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="title" value="" class="form-control" required>
                            {{-- @error('title') --}}
                                <span class="text-danger">scsauigL</span>
                            {{-- @enderror --}}
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <img src="" alt="major" class="img-fluid "
                                    height="200" width="200">
                            </div>
                            <div class="mb-3">
                                <label for="image">Upload Image</label>
                                <input type="file" name="image" value="" class="form-control">
                                {{-- @error('image') --}}
                                    <span class="text-danger">DAhgljdca</span>
                                {{-- @enderror --}}
                            </div>
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
