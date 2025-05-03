@extends('admin.app')

@section('title', 'Home')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $admins }}</h3>
                                <p>Admins</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-user-tie"></i>
                            </div>
                            <a href="{{ route('admins.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-light">
                            <div class="inner">
                                <h3>{{ $books }}</h3>
                                <p>Books</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-book"></i>
                            </div>
                            <a href="{{ route('books.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $categories }}<sup style="font-size: 20px"></sup></h3>
                                <p>Categories</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-list"></i>
                            </div>
                            <a href="{{ route('categories.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3>{{ $messages }}<sup style="font-size: 20px"></sup></h3>
                                <p>Messages</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-message"></i>
                            </div>
                            <a href="{{ route('messages.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $orders }}</h3>
                                <p>Orders</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-file-invoice-dollar"></i>
                            </div>
                            <a href="{{ route('orders.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>{{ $publishers }}</h3>
                                <p>Publishers</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-user-tie"></i>
                            </div>
                            <a href="{{ route('publishers.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                   <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $reviews }}</h3>
                                <p>Reviews</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <a href="{{ route('reviews.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $users }}</h3>
                                <p>Users</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="{{ route('users.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div> 
                </div>
                <!-- /.row -->
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
