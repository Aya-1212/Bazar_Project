  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light justify-content-between">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/admin/home') }}" class="nav-link">Home</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        {{-- <form action="{{ route(name: 'auth.logout') }}" method="POST"> --}}
          {{-- @csrf --}}
          {{-- @method('DELETE') --}}
          <button type="submit" class="btn btn-danger">Logout</button>
        {{-- </form> --}}
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->