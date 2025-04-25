@extends('admin.app')

@section('title', 'All Category')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 text-center">
                        <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">Categories</h1>
                        <p class="font-weight-normal" style="font-size: 1.2em;">List of all Registered Categories</p>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Majors -->
        <section class="content">
            <div class="container-fluid">
                {{-- <x-success />
                <x-error /> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title text-center" style="font-size: 1.5em;">Categories</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                {{-- @if (empty($majors->items()))
                                    <x-empty-state>{{ 'Majors' }}</x-empty-state> --}}
                                {{-- @else --}}
                                <table class="table table-sm table-bordered border-primary "
                                    style="width: 100%; border: 1px solid #ddd;">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%; text-align: center; padding: 10px;">Id</th>
                                            <th style="width: 20%; text-align: center; padding: 10px;">Title</th>
                                            <th style="width: 30%; text-align: center; padding: 10px;">Image</th>
                                            <th style="width: 20%; text-align: center; padding: 10px;">Delete</th>
                                            <th style="width: 20%; text-align: center; padding: 10px;">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($majors as $major) --}}
                                        <tr>
                                            <td style="text-align: center; word-wrap: break-word;">
                                                {{-- {{ $loop->iteration }} --}}
                                            </td>
                                            <td style="text-align: center; word-wrap: break-word;">
                                                {{-- {{ $major->title }} --}}
                                            </td>
                                            <td style="text-align: center;">
                                                <img src="img" alt="=category" class="img-fluid " height="100"
                                                    width="120">
                                            </td>
                                            <td style="text-align: center;">
                                                <form action="" method="POST">
                                                    {{-- @csrf --}}
                                                    {{-- @method('DELETE') --}}
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                            <td style="text-align: center;">
                                                <form action="#" method="POST">
                                                    {{-- @csrf --}}
                                                    {{-- @method('GET') --}}
                                                    <button class="btn btn-success">Edit</button>
                                                </form>
                                            </td>
                                        </tr>
                                        {{-- @endforeach --}}
                                    </tbody>
                                </table>
                                {{-- @endif --}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                {{-- {{ $majors->links() }} --}}
            </div>
        </section>
        <!-- end majors -->

    </div>
@endsection
