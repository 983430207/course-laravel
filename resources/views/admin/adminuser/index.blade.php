@extends('admin.layouts.app')

@section('title')
管理员管理
@endsection


@section('sidebar')
@include('admin.adminuser.menu')
@endsection

@section('content')
数据列表
@endsection
