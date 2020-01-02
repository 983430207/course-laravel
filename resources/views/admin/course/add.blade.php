@extends('admin.layouts.app')

@section('title')
课程添加
@endsection


@section('sidebar')
@include('admin.course.menu')
@endsection

@section('content')
@page_title(['title'=>'课程添加', 'comment'=>'管理您的课程…'])
@endpage_title

<div class='row'>
    <div class='col-12'>
        <form method='post' action='{{route("admin.course.add",[ $course->id ])}}' enctype='multipart/form-data'>
            @csrf
            <div class="form-group row">
                <label class="col-2 col-form-label">标题</label>
                <div class="col-10">
                    <input type="text" class="form-control" name='title' value='{{old("title",$course->title)}}'>
                    @error('title')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2 col-form-label">简介</label>
                <div class="col-10">
                    <textarea class="form-control" name='desc'>{{old("desc",$course->desc)}}</textarea>
                    @error('desc')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2 col-form-label">排序</label>
                <div class="col-10">
                    <input type="text" class="form-control" name='sort' value='{{old("sort",$course->sort)}}'>
                    @error('sort')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2 col-form-label">头图</label>
                <div class="col-8">
                    <input type="file" class="form-control-file" name='image' />
                    @error('image')
                    <small class="form-text text-danger">{{$message}}</small>
                    @else
                    <small class="form-text text-muted">可选上传，建议使用 800*600 大小的头图</small>
                    @enderror
                </div>
                <div class='col-2'><img src='{{$course->image_link}}' class='img-fluid' /></div>
            </div>


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