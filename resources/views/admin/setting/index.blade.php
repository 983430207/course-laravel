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

@endsection