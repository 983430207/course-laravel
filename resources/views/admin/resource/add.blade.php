@extends('admin.layouts.app')

@section('title')
课程资源
@endsection


@section('sidebar')
@include('admin.resource.menu')
@endsection

@section('content')
@page_title(['title'=>'课程资源', 'comment'=>'你的课程资源数据中心'])
@endpage_title

<div class='row'>
    <div class='col-12'>
        <form method='post' action='{{route("admin.resource.add", [$resource->id])}}'>
            @csrf
            <div class="form-group row">
                <label class="col-2 col-form-label">资源类型</label>
                <div class="col-10 col-form-label">
                    {!! config("project.resource.type")[$type] !!}
                    <input type="hidden" name='type' value='{{$type}}'>
                    @error('type')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 col-form-label">标题</label>
                <div class="col-10">
                    <input type="text" class="form-control" name='title' value='{{old("title",$resource->title)}}'>
                    @error('title')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 col-form-label">简介</label>
                <div class="col-10">
                    <textarea class="form-control" name='desc'>{{old("desc",$resource->desc)}}</textarea>
                    @error('desc')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            @if($type==\App\Models\Resource::VIDEO)
            @include("admin.resource.add_video")
            @endif

            @if($type==\App\Models\Resource::DOC)
            @include("admin.resource.add_doc")
            @endif
            <div class="form-group row">
                <div class='offset-2'></div>
                <div class="col-10">
                    <button type="submit" class="btn btn-primary">保存</button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection