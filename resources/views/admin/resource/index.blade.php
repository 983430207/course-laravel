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


@endsection