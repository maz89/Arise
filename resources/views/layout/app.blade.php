<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preclinic.dreamguystech.com/template/add-leave-type.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Jun 2022 12:22:49 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title')</title>


    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
 @yield('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <!--[if lt IE 9]>
    <script src="{{asset('assets/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('assets/js/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body>
<div class="main-wrapper">
    @include('layout.components.header')
    @include('layout.components.sidebar')
    @include('layout.components.content')


</div>
<div class="sidebar-overlay" data-reff=""></div>
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>

@yield('js')

<script src="{{asset('assets/js/app.js')}}"></script>
</body>

<!-- Mirrored from preclinic.dreamguystech.com/template/add-leave-type.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Jun 2022 12:22:49 GMT -->
</html>
