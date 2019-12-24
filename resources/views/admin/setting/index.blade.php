@extends('admin.layouts.app')

@section('title')
系统设置
@endsection


@section('sidebar')
@include('admin.setting.menu')
@endsection

@section('content')
@page_title(['title'=>'系统设置', 'comment'=>'配置系统中可用的开关和基础信息'])
@endpage_title
<div class='row'>
    <div class='col-12'>
        <form method='post' action='{{route("admin.setting")}}'>
            @csrf 
            @foreach($settings as $setting)
            <div class="form-group row">
                <label class="col-2 col-form-label">{{$setting['name']}}</label>
                <div class="col-10">
                    <input type="text" class="form-control" name='settings[{{$setting["key"]}}]' value='{{$setting["value"]}}'>
                    <small class="form-text text-muted">{{$setting["comment"]}}</small>
                </div>
            </div>
            @endforeach
            <div class="form-group row">
                <div class='offset-2'></div>
                <div class="col-10">
                    <button type="submit" class="btn btn-primary">保存修改</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection