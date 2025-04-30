@extends('admin.layouts.auth')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Sign In</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign-in to the BookStore system for Management</p>
      <form action="{{ route('admin.signin.submit') }}" method="POST" novalidate>
        @csrf
        <div>
          <div class="input-group mb-3">
            <input type="email" class="form-control" value="{{ old('email') }}" name="email" required placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          @error('email')
          <span class="text-danger"><span class="danger">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" value="{{ old('password') }}" name="password" required placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('password')
          <span class="text-danger"><span class="danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
  </div>
</div>   
@endsection




