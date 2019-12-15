@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">我的留言板</h1>
        <p class="lead">根据1024编程实验室做的入门程序，请大家鉴赏。</p>
    </div>
    <form action="{{route('save')}}" method='POST'>
        @csrf
        <div class='row'>
            <div class='col-12'>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-group">
                    <textarea id='content' name='content' class="form-control" rows='4'></textarea>
                    <script>
                        var editor = new Simditor({
                            textarea: $('#content')
                            //optional options
                        });
                    </script>
                </div>
            </div>
            <div class='col-3'>
                <div class="form-group">
                    <input name='username' class='form-control' type='text' />
                </div>
            </div>
            <div class='col-9 d-flex'>
                <div class="form-group ml-auto">
                    <input class='btn btn-primary' type='submit' value='提交' />
                </div>
            </div>

        </div>
    </form>

    <div class='row'>
        <div class='col-12'>
            @foreach($msgs as $msg)
            <div class='border rounded p-2 mb-2'>
                <div class='text-primary'>{{$msg->username}}</div>
                <div>{!! $msg->content !!}</div>
            </div>
            @endforeach
        </div>
    </div>
    <div class='row'>
        <div class='col-12'>
            {{ $msgs->links() }}
        </div>
    </div>
</div>
@endsection