@extends('admin.app')

@section('title', 'All Admins')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-12 text-center position-relative">
                        <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">Admins</h1>
                        <p class="font-weight-normal" style="font-size: 1.2em;">List of all Admins</p>                        
                        <a href="{{ route(name: 'admins.add') }}" class="btn btn-primary position-absolute" style="top: 0; right: 0;">Add Admin</a>
                    </div>
                </div>
            </div>
        </section>        
        <!-- admins -->
        <section class="content">
            <div class="container-fluid">
                <x-success-state />
                <x-error-state />
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                               @if (empty($admins->items()))
                                    <x-empty-state>{{ 'Admins' }}</x-empty-state> 
                                @else
                                <table class="table table-sm table-bordered border-primary "
                                    style="width: 100%; border: 1px solid #ddd;">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%; text-align: center; padding: 10px;">#</th>
                                            <th style="width: 20%; text-align: center; padding: 10px;">Name</th>
                                            <th style="width: 30%; text-align: center; padding: 10px;">Email</th>
                                            <th style="width: 20%; text-align: center; padding: 10px;">Edit</th>
                                            <th style="width: 20%; text-align: center; padding: 10px;">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $admin)
                                        <tr>
                                            <td style="text-align: center; word-wrap: break-word;">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td style="text-align: center; word-wrap: break-word;">
                                                {{ $admin->name }}      
                                            </td>
                                            <td style="text-align: center; word-wrap: break-word;">
                                                {{ $admin->email }}
                                            </td>
                                            <td style="text-align: center;">
                                                <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-success">Edit</a>
                                            </td>
                                            <td style="text-align: center;">
                                                <form action="" method="POST">
                                                    {{-- @csrf --}}
                                                    {{-- @method('DELETE') --}}
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                {{-- {{ $admins->links() }} --}}
            </div>
        </section>
        <!-- end admins -->
    </div>
@endsection
