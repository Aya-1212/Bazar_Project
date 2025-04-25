@extends('admin.app')

@section('title', 'Add Category')


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="col-8 mx-auto">
                    <h1 class="font-weight-bold text-center" style="font-size: 2em; color: #007bff;">
                        Add Category
                    </h1>
                    {{-- <x-success/> --}}
                    <form class="form border p-3" method="" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Category Name</label>
                            <input type="text" value="" name="title" class="form-control">
                            {{-- @error('title') --}}
                                <span class="text-danger">sakgkas</span>
                            {{-- @enderror --}}
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Image</label>
                            <input type="file" value="" name="image" class="form-control">
                            {{-- @error('image') --}}
                                <span class="text-danger">dsjBGDKL</span>
                            {{-- @enderror --}}
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
