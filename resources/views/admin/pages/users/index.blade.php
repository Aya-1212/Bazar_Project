@extends('admin.app')

@section('title', 'All Users')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 text-center">
                        <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">Users</h1>
                        <p class="font-weight-normal" style="font-size: 1.2em;">List of all Users</p>
                        <a href="{{ route(name: 'users.add') }}" class="btn btn-primary position-absolute"
                            style="top: 0; right: 0;">Add User</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- users -->
        <section class="content">
            <div class="container-fluid">
                {{-- <x-success />
                <x-error /> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title text-center" style="font-size: 1.5em;">Users</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                @if (empty($users->items()))
                                    <x-empty-state>{{ 'Users' }}</x-empty-state>
                                @else
                                    <table class="table table-sm table-bordered border-primary "
                                        style="width: 100%; border: 1px solid #ddd;">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%; text-align: center; padding: 10px;">#</th>
                                                <th style="width: 20%; text-align: center; padding: 10px;">Name</th>
                                                <th style="width: 20%; text-align: center; padding: 10px;">Email</th>
                                                <th style="width: 30%; text-align: center; padding: 10px;">Image</th>
                                                <th style="width: 30%; text-align: center; padding: 10px;">Phone</th>
                                                <th style="width: 40%; text-align: center; padding: 10px;">Address</th>
                                                <th style="width: 30%; text-align: center; padding: 10px;">City</th>
                                                <th style="text-align: center; padding: 10px;">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                                <td style="text-align: center; word-wrap: break-word;">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td style="text-align: center; word-wrap: break-word;">
                                                    {{ $user->name }}
                                                </td>
                                                <td style="text-align: center; word-wrap: break-word;">
                                                    {{ $user->email }}
                                                </td>
                                                <td style="text-align: center;">
                                                    <img src="{{ asset('upload/users/'.$user->image)}}" alt="=user" class="img-fluid " height="100"
                                                        width="120">
                                                </td>
                                                <td style="text-align: center; word-wrap: break-word;">
                                                    {{ $user->phone ?? 'N/A' }}
                                                </td>
                                                <td style="text-align: center; word-wrap: break-word;">
                                                    {{ $user->address ?? 'N/A' }}
                                                </td>
                                                <td style="text-align: center; word-wrap: break-word;">
                                                    {{ $user->city ?? 'N/A' }}
                                                </td>
                                                <td style="text-align: center;">
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
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
                {{ $users->links() }}
            </div>
        </section>
        <!-- end users -->

    </div>
@endsection
