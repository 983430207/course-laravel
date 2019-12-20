@extends('admin.layouts.app')

@section('title')
管理员管理
@endsection


@section('sidebar')
@include('admin.adminuser.menu')
@endsection

@section('content')
@page_title(['title'=>'管理员', 'comment'=>'管理员管理'])
@endpage_title

数据列表
@endsection
