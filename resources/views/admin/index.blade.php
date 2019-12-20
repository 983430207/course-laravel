@extends('admin.layouts.app')

@section('content')

<?php
dump( Auth::guard('admin')->user() );
?>

@endsection