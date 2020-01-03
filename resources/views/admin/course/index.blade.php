@extends('admin.layouts.app')

@section('title')
课程管理
@endsection


@section('sidebar')
@include('admin.course.menu')
@endsection

@section('content')
@page_title(['title'=>'课程管理', 'comment'=>'管理您的课程…'])
@endpage_title

<div class='row'>
    <div class='col-12'>
        <table class="table table-sm">
            <thead class="thead-light">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col" width='100'>头图</th>
                    <th scope="col">课程</th>
                    <th scope="col">排序</th>
                    <th scope="col">创建时间</th>
                    <th scope="col">编辑时间</th>
                    <th scope="col">管理</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                <tr>
                    <th scope="row">{{$course->id}}</th>
                    <td>
                        <img src='{{$course->image_link}}' class='img-fluid' />
                    </td>
                    <td>{{$course->title}}</td>
                    <td>{{$course->sort}}</td>
                    <td>{{$course->created_at}}</td>
                    <td>{{$course->updated_at}}</td>
                    <td>
                        <a href='{{route("admin.course.detail", [$course->id])}}' class='btn btn-sm btn-primary'>管理</a>
                        <a href='{{route("admin.course.add", [$course->id])}}' class='btn btn-sm btn-secondary'>修改</a>
                        <a onclick='return confirm("确认删除吗？")' href='{{route("admin.course.remove", [$course->id])}}' class='btn btn-sm btn-danger'>移除</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection