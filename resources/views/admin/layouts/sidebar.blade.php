<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #003366;">
    <!-- Brand Logo -->
    <a href="{{ url('admin.home') }}">
        <img src="{{ asset('admin/images') }}/logo.svg" alt="AdminLTE Logo" class="brand-image"
            style="color: #fff; height: 120px; width: 150px;">
    </a>
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin/images') }}/admin.gif" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('admin.home') }}" class="nav-link ">
                        <img src="{{ asset('admin/images') }}/dashboard.gif" alt="Dashboard"
                            style="width: 20px; height: 20px;" />
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- -- dropDown---->
                <li class="nav-item">
                    <a href="{{ route('admins.index') }}" class="nav-link">
                        <img src="{{ asset('admin/images') }}/admin2.gif" alt="admin"
                            style="width: 20px; height: 20px;" />
                        <p>Admins</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admins.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Table</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('books.index') }}" class="nav-link">
                        <img src="{{ asset('admin/images') }}/book.gif" alt="books"
                            style="width: 20px; height: 20px;" />
                        <p>Books</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('books.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Table</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <img src="{{ asset('admin/images') }}/books.gif" alt="categories"
                            style="width: 20px; height: 20px;" />
                        <p>
                            Categories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Table</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('messages.index') }}" class="nav-link">
                        <img src="{{ asset('admin/images') }}/message.gif" alt="messages"
                            style="width: 20px; height: 20px;" />
                        <p>Messages</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('messages.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Table</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('orders.index') }}" class="nav-link">
                        <img src="{{ asset('admin/images') }}/order.gif" alt="orders"
                            style="width: 20px; height: 20px;" />
                        <p>Orders</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('orders.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Table</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('publishers.index') }}" class="nav-link">
                        <img src="{{ asset('admin/images') }}/publisher.gif" alt="publishers"
                            style="width: 20px; height: 20px;" />
                        <p>Publishers</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('publishers.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Table</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <img src="{{ asset('admin/images') }}/review.gif" alt="review"
                            style="width: 20px; height: 20px;" />
                        <p>Reviews</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('reviews.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Table</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <img src="{{ asset('admin/images') }}/users.gif" alt="users"
                            style="width: 20px; height: 20px;" />
                        <p>Users</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Table</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
