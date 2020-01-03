@extends('admin.layouts.app')

@section('title')
文件管理
@endsection


@section('sidebar')
@include('admin.file.menu')
@endsection

@section('content')
@page_title(['title'=>'文件管理', 'comment'=>'管理您的文件…'])
@endpage_title

<div class='row'>
    <div class='col-12'>
        
    </div>
</div>
@endsection