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

@if($type==\App\Models\Resource::VIDEO)
    @include("admin.resource.add_video")
@endif

@if($type==\App\Models\Resource::DOC)
    @include("admin.resource.add_doc")
@endif

@endsection