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

<div class='row mt-2'>
    <div class='col-12'>
        <table class="table table-sm">
            <thead class="thead-light">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">作者</th>
                    <th scope="col">类型</th>
                    <th scope="col">标题</th>
                    <th scope="col">创建时间</th>
                    <th scope="col">管理</th>
                </tr>
            </thead>
            <tbody>
                @foreach($resources as $resource)
                <tr>
                    <th scope="row">{{$resource->id}}</th>
                    <th scope="row">{{$resource->adminUser->username??'-/-'}}</th>
                    <th scope="row">{!! $resource->type_name !!}</th>
                    <td>{{$resource->title}}</td>
                    <td>{{$resource->created_at}}</td>
                    <td>
                        <a href='#' class='btn btn-sm btn-secondary'>修改</a>
                        <a href='#' class='btn btn-sm btn-danger' onclick='return confirm("确认删除吗？")'>删除</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $resources->appends(request()->all())->links() }}
    </div>
</div>

@endsection