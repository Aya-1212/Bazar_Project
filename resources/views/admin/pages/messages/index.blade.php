@extends('admin.app')

@section('title', 'All Messages')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 text-center">
                        <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">Messages</h1>
                        <p class="font-weight-normal" style="font-size: 1.2em;">List of all Messages</p>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        {{-- Debug --}}
        <!-- messages -->
        <section class="content">
            <div class="container-fluid">
                <x-success-state />
                <x-error-state />
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                @if (empty($messages->items()))
                                    <x-empty-state>{{ 'Messages' }}</x-empty-state>
                                @else
                                    <table class="table table-sm table-bordered border-primary "
                                        style="width: 100%; border: 1px solid #ddd;">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center; padding: 10px;">#</th>
                                                <th style="text-align: center; padding: 10px;">Name</th>
                                                <th style="text-align: center; padding: 10px;">Email</th>
                                                <th style="text-align: center; padding: 10px;">Subject</th>
                                                <th style="width: 50%; text-align: center; padding: 10px;">Content</th>
                                                <th style="text-align: center; padding: 10px;">User_Id</th>
                                                <th style="text-align: center; padding: 10px;">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($messages as $message)
                                                <tr>
                                                    <td style="text-align: center;">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td style="text-align: center;">{{ $message->name }}</td>
                                                    <td style="text-align: center;">{{ $message->email }}</td>
                                                    <td style="text-align: center;">{{ $message->subject }}</td>
                                                    <td style="text-align: center;">{{ $message->content }} </td>
                                                    <td style="text-align: center;">
                                                        <a href="{{ route('users.show', $message->user_id) }}">
                                                            {{ $message->user_id }} 
                                                        </a>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <form action="{{ route('messages.destroy', $message->id) }}" method="POST" >
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
                {{ $messages->links() }}
            </div>
        </section>
        <!-- end messages -->

    </div>
@endsection
