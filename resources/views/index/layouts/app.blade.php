<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title', '首页') - {{setting("webname")}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('static/css/bootstrap.min.css')}}">
    <link href="https://cdn.bootcss.com/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('static/css/index.css')}}?{{time()}}">
    @yield('css')
</head>

<body>
    @include('index.layouts.nav')
    <div class='container'>

        <div class='row mb-2 mt-2'>
            <div class='col-12'>
                <img src='{{asset("static/images/banner.jpg")}}' class='img-fluid' />
            </div>
        </div>

        <div class='row mb-2 mt-2'>
            <div class='col-12'>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">首页</a></li>
                        @yield('breadcrumb')
                    </ol>
                </nav>
            </div>
        </div>
        <div class='row'>
            <div class="col-9">
                @yield('content')
            </div>
            <div class="col-3">
                @yield('sidebar')
            </div>
        </div>
    </div>

    <div class='container-fluid'>
        <div class='row mt-3'>
            <div class='col-12 bg-dark p-5 text-center align-middle text-muted'>
                <p>该软件为「1024编程实验室」系列课程作品，并作为开源软件。</p>
                <p>官方网站 「<a href='http://www.sodevel.com' class='text-muted'>1024编程实验室</a>」，作者工作微信：pmtt9121</p>
            </div>
        </div>
    </div>

    <script src="{{asset('static/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('static/js/popper.min.js')}}"></script>
    <script src="{{asset('static/js/bootstrap.min.js')}}"></script>
    @yield('js')
</body>

</html>