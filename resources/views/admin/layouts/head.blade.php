
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/images/book.png') }}">

    <title>Dashboard || @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{  asset('admin/plugins') }}/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{  asset('admin/plugins') }}/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" ;?>
    <!-- iCheck -->
    <link rel="stylesheet" href="{{  asset('admin/plugins') }}/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{  asset('admin/plugins') }}/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{  asset('admin/dist') }}/css/adminlte.min.css" ; ?>
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{  asset('admin/plugins') }}/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{  asset('admin/plugins') }}/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{  asset('admin/plugins') }}/summernote/summernote-bs4.min.css">
    <!--------------awesome icons----->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="shortcut icon" type="{{  asset('admin/images') }}image/x-icon" href="{{  asset('admin/images') }}/logo.ico">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{  asset('admin/dist') }}/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>