@extends('index.layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item active">{{$course->title}}</li>
@endsection

@section('sidebar')
@include('index.sidebar')
@endsection

@section('content')
<div class='row'>
    <div class='col-12'>
        <div class="media mb-3">
            <img class="mr-3 border rounded" src="{{$course->image_link}}" style='width:200px;'>
            <div class="media-body">
                <h1 class="mt-0">{{$course->title}}</h1>
                <p class='text-muted'>{{$course->desc}}</p>
            </div>
        </div>
    </div>

    <div class='col-12'>
        @foreach(($course->chapter()->with("resource")->get()) as $chapter)
        <div class='row mt-2 mb-3'>
            <div class='col-12'>
                <div class='d-flex mb-2'>
                    <h5 class='m-0 p-0'><i class='fa fa-angle-down'></i> {!! $chapter->title !!}</h5>
                    <small class="text-muted mr-auto pl-2 align-middle" style='margin:auto 0;'>
                        {!! $chapter->desc !!}
                    </small>
                </div>
            </div>

            <div class='col-12'>
                <div class="list-group">
                    @foreach($chapter->resource as $resource)
                    <div class="list-group-item list-group-item-action d-flex">
                        {!!$resource->typeName!!} &nbsp;&nbsp;-&nbsp;&nbsp; 
                        <a href="{{route('course.resource', [$course->id, $resource->id])}}" title='{{$resource->desc}}'>
                            {{$resource->title}}
                        </a>
                        <span class='ml-auto text-muted text-sm'>{{$resource->updated_at}}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection