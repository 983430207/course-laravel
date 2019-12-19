<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title', '首页')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('static/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/admin.css')}}?{{time()}}">
    @yield('css')
</head>
<body>
<div class='container'>
    @yield('content')
</div>
<script src="{{asset('static/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('static/js/popper.min.js')}}"></script>
<script src="{{asset('static/js/bootstrap.min.js')}}"></script>
@yield('js')
</body>
</html>