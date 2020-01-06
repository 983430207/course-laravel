@extends('index.layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item active">所有课程</li>
@endsection

@section('sidebar')
@include('index.sidebar')
@endsection

@section('content')
<div class='row'>
    @foreach($courses as $course)
    <div class='col-6 mb-3'>
        <div class="media">
            <img class="mr-3 img-fluid rounded" style='width:200px;' src="{{$course->image_link}}">
            <div class="media-body">
                <h5 class="mt-0"><a href='{{route("course.index",[$course->id])}}'>{!!$course->title!!}</a></h5>
                <p class='text-muted'>{!!$course->desc!!}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection