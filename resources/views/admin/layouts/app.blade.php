<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title', '首页') - {{setting("webname")}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('static/css/bootstrap.min.css')}}">
    <link href="https://cdn.bootcss.com/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('static/css/admin.css')}}?{{time()}}">
    @yield('css')
</head>
<body>
    @include('admin.layouts.nav')
    <div class='d-flex'>
        <div class="sidebar navbar-nav">
            @yield('sidebar')
        </div>
        <div class='container-fluid'>
            @include('admin.layouts.message')
            @yield('content')
        </div>
    </div>
<script src="{{asset('static/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('static/js/popper.min.js')}}"></script>
<script src="{{asset('static/js/bootstrap.min.js')}}"></script>
@yield('js')
</body>
</html>